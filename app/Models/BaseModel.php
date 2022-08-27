<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Morilog\Jalali\Jalalian;



class BaseModel extends Model
{
    use HasFactory;
    /**
    * @return string
    */
   public function getCreatedAtAttribute($value)
   {
       return   Jalalian::fromCarbon(Carbon::createFromTimestamp(strtotime($value))
           ->timezone('Asia/Tehran')
       )->toString();
   }

   protected function getPerPageNumber(int $perPage): int
   {
       return ($perPage > $this->perPageLimit) ? $this->perPageLimit : $perPage;
   }

   /**
    * @return array
    */
   protected function getColumnsOfTable(): array
   {
       $table = $this->getTable();
       return Schema::getColumnListing($table);
   }

   /**
    * @param Request $request
    * @return LengthAwarePaginator
    */
   public function index(Request $request): LengthAwarePaginator
   {
       $perPage = $this->getPerPageNumber((int)$request->query('perPage', $this->perPageLimit));
       $columns = $this->getColumnsOfTable();
       $index = $this->query();
       $index->when($request->has('search'), function ($query) use ($columns, $request) {
           foreach ($columns as $column) {
               $query->orWhere($column, 'LIKE', "%" . $request->get('search') . "%");
           }
       });
       return $index->paginate($perPage, '', '', $request->get('page'));
   }

   /**
    * @param $id
    * @return Model|null
    */
   public function show($id): ?Model
   {
       return $this->query()->getRelations()->with(['users'])->where('id', $id)->first();
   }

   /**
    * @param $attributes
    * @return Model|Builder
    */
   public function store($attributes): Model|Builder
   {
       return $this->query()->create($attributes);
   }

   /**
    * @param $id
    * @param $credentials
    * @return Model|null
    */
   public function updateAndFetch($id, $credentials): ?Model
   {
       $update = $this->updateModel($id, $credentials);
       if ($update)
           return $this->fetch($id);
       return null;
   }

   /**
    * @param $id
    * @return mixed
    */
   public function deleteModel($id): mixed
   {
       return $this->query()->where('id', $id)->delete();
   }

   /**
    * @param $id
    * @param $credentials
    * @return int
    */
   public function updateModel($id, $credentials): int
   {
       return $this->query()->where('id', $id)->update($credentials);
   }

   /**
    * @param $id
    * @return Model|null
    */
   public function fetchOrFail($id): ?Model
   {
       return $this->query()->findOrFail($id);
   }
    public function fetch($id): ?Model
    {
        return $this->query()->where('id',$id)->first();
    }


    public function updateAndCreate($id,$credentials)
    {
        $update = $this->fetch($id);
        if (!empty($update))
            return $this->updateAndFetch($id, $credentials);
        else
            return $this->store($credentials);
    }


}

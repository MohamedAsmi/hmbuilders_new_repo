<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $_token;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = -1;

    public static function getById($id, $columns = [])
    {
        if (!empty($columns)) {
            return self::select($columns)
                ->where($id)
                ->first();
        } else {
            return self::find($id);
        }
    }

    public static function getByIds($ids, $columns = [])
    {
        if (!empty($columns)) {
            return self::select($columns)
                ->whereIn('id', $ids)
                ->get();
        } else {
            return self::whereIn('id', $ids)
                ->get();
        }
    }

    public static function getAll($columns = [])
    {
        if (!empty($columns))
            return self::select($columns)->orderBy('id', 'ASC')->get();
        else
            return self::orderBy('id', 'ASC')->get();

    }

    public static function getSelected($conditions, $columns = [], $orderBy = [])
    {
        $rows = self::where($conditions);

        if (!empty($columns)) {
            $rows = $rows->select($columns);
        }

        if (!empty($orderBy) && is_array($orderBy)) {
            foreach ($orderBy as $key => $value) {
                $rows = $rows->orderBy($key, $value);
            }
        } else {
            $rows = $rows->orderBy('id', 'ASC');
        }

        return $rows->get();
    }

    public static function getFirst($conditions = [], $columns = [])
    {
        $rows = self::where($conditions);

        if (!empty($columns)) {
            $rows = $rows->select($columns);
        }

        return $rows->first();
    }

    public static function insertRow($data)
    {
        return self::create($data);
    }

    public static function insertFirstRow($data,$d)
    {
        return self::createFirstRecord($data, $d);
    }

    public static function updateById($id, $data)
    {
        return self::where('id', '=', $id)
            ->update($data);
    }

    public static function updateByIds(array $ids, $data)
    {
        return self::whereIn('id', $ids)
            ->update($data);
    }

    public static function updateSelected($conditions, $data)
    {
        return self::where($conditions)
            ->update($data);
    }

    public static function deleteById($id)
    {
        return self::getById($id)->delete();
    }

    public static function deleteSelected($conditions = [])
    {
        return self::where($conditions)
            ->delete();
    }

    public static function getCount($condition)
    {
        return self::where($condition)
            ->count();
    }

    public static function getBadge($message, $class = '')
    {
        return '<span class="badge bg-' . $class . '">' . $message . '</span>';
    }

    public static function getStatusBadge($model, $messages = ['Active', 'Inactive'], $statusColumn = 'status')
    {
        $status = $model->$statusColumn;
        if ($status == BaseModel::STATUS_ACTIVE)
            return '<span class="badge bg-success">' . $messages[0] . '</span>';
        //if ($status == BaseModel::STATUS_INACTIVE)
        else
            return '<span class="badge bg-danger">' . $messages[1] . '</span>';
    }

    public static function getFormatedDate($colName){
        return $colName ? with(new Carbon($colName))->format('m-d-Y') : '';
    }


    public static function getchecked($model, $messages = ['Active', 'Inactive'], $statusColumn = 'status')
    {
        $status = $model->$statusColumn;
        if ($status == BaseModel::STATUS_ACTIVE)
            return '<span class="badge bg-success">' . $messages[0] . '</span>';
        if ($status == BaseModel::STATUS_INACTIVE)
            return '<span class="badge bg-danger">' . $messages[1] . '</span>';
    }
}
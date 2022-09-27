<?php namespace App\Models;

use App\Entities\Category;
use CodeIgniter\Model;


class CategoriesModel extends Model
{
  protected $table            = 'categories';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = Category::class;
  protected $useSoftDeletes   = true;
  protected $allowedFields    = ['name',];
  // Dates
  protected $useTimestamps = true;
  protected $deletedField  = 'deleted_at';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
// modelo  CategoriesModel.php  ----------------------------------------------------
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\IRenderableModel;
use App\Interfaces\ICRUDModel;
use Language;
use App;

class Blog extends Model implements IRenderableModel, ICRUDModel
{
    private const TRANSLATABLE = ['title', 'header', 'content'];
    public const CHANGABLE = [
        'Title(RU)' => ['type' => 'text', 'field' => 'title_ru'],
        'Title(EN)' => ['type' => 'text', 'field' => 'title_en'],
        'Header(RU)' => ['type' => 'text', 'field' => 'header_ru'],
        'Header(EN)' => ['type' => 'text', 'field' => 'header_en'],
        'Content(RU)' => ['type' => 'text', 'field' => 'content_ru'],
        'Content(EN)' => ['type' => 'text', 'field' => 'content_en']
    ];
    protected $fillable = ['title_ru', 'title_en', 'header_ru', 'header_en', 'content_ru', 'content_en'];
    public const ROOT_ELEMENT_ID = 1;

    public $with = ['parent'];
    protected $appends = ['children'];

    public function getChildrenAttribute() {
        return $this->where('parent_id', $this->id)
                    ->orderBy(!empty($this->order_field) ? $this->order_field : 'id', $this->order_by ? 'ASC' : 'DESC')
                    ->get()
        ;
    }

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function __get($fieldName) {
        if (in_array($fieldName, self::TRANSLATABLE)) {
            return $this->{$fieldName.'_'.App::getLocale()};
        } else {
            return parent::__get($fieldName);
        }
    }

    public function getTemplateName() {
        if ($this->children->isEmpty()) {
            return 'blogs.show';
        } else {
            return 'blogs.index';
        }
    }

    public static function buildForm($blog) {?>
        <form method="post" action="/admin/blogs/edit<?=$blog ? '/'.$blog->id : ''?>">
            <?= csrf_field() ?>
            <? foreach(self::CHANGABLE as $label => $field): ?>
            <div>
                <label><?=$label?></label>
                <input type="<?=$field['type']?>" name="<?=$field['field']?>" value="<?=$blog ? $blog->{$field['field']} : ''?>">
            </div>
            <? endforeach; ?>
            <input type="submit" value="save">
        </form>
    <?}

    public function getAdminTemplateName() {
        return 'admin.blogs.index';
    }

    public function getAdminEditTemplateName() {
        return 'admin.blogs.edit';
    }
}

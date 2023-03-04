<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use App\Models\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Markdown;
use Illuminate\Support\Facades\Storage;

class ArticleController extends AdminController
{
    protected $title = '文章';

    /**
     * Make a grid builder.
     */
    protected function grid(): Grid
    {
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('category_id', '分类')
                 ->display(function ($categoryId) {
                     return Category::query()->find($categoryId)?->title ?: '未分类';
                 });
            $grid->column('title', '标题');
            $grid->column('cover', '封面')->image(width: 50, height: 50);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('title', '标题');
            });
        });
    }

    /**
     * Make a show builder.
     */
    protected function detail(int $id): Show
    {
        return Show::make($id, new Article(), function (Show $show) {
            $show->field('title', '标题');
            $show->field('cover', '封面')->image();
            $show->html(function () {
                /** @var $this Article */
                $markdown = Markdown::make($this->content);
                return <<<TOF
<div class="show-field form-group row">
    <div class="col-sm-2 control-label">
        <span>正文</span>
    </div>
    <div class="col-sm-8">
        <div class="box box-solid box-default no-margin box-show">
            <div class="box-body">
                $markdown
            </div>
        </div>
    </div>
</div>
TOF;
            });
            $show->field('views', '阅读量');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     */
    protected function form(): Form
    {
        return Form::make(new Article(), function (Form $form) {
            $form->select('category_id', '分类')
                 ->options(Category::selectOptions())
                 ->default(0);
            $form->text('title', '标题');
            $form->image('cover', __('admin.article.cover'));
            $form->markdown('content')->imageDirectory('images');
        });
    }
}

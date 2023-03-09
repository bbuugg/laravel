<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Tree;

class CategoryController extends AdminController
{
    protected $title = '分类';

    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->body(new Tree(new \App\Models\Category(), function (Tree $tree) {
                $tree->disableCreateButton();
                $tree->disableEditButton();

                $tree->branch(function ($branch) {
                    $branchName = htmlspecialchars($branch['title']);
                    $branchId   = $branch['id'];
                    $branchDesc = htmlspecialchars($branch['description']);
                    return <<<EOT
<div class='pull-left' style='min-width:310px; cursor: pointer'>
    <b>{$branchName}</b>&nbsp;&nbsp;[<span class='text-primary'>{$branchId}</span>]
</div>
&nbsp; {$branchDesc}
<a class="dd-nodrag"></a>
EOT;
                });
            }));
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     */
    protected function detail($id): Show
    {
        return Show::make($id, new Category(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('description');
            $show->field('order');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     */
    protected function form(): Form
    {
        return Form::make(new Category(), function (Form $form) {
            $form->select('parent_id', '分类')
                 ->options(\App\Models\Category::selectOptions())
                 ->default(0);
            $form->text('title', '名称');
            $form->text('description');
            $form->number('order', '排序');
        });
    }
}

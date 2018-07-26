<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Model\Item;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class ItemController extends Controller
{
    use ModelForm;

    /**
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('item.list'));
            $content->body($this->grid());
        });
    }

    /**
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header(trans('item.update'));
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('item.create'));
            $content->body($this->form());
        });
    }

    /**
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Item::class, function (Grid $grid) {

            $grid->uuid('ID');
            $grid->name('Name')->sortable();
            $grid->price('Price')->sortable();
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Item::class, function (Form $form) {

            $form->display('uuid', 'ID');
            $form->display('name', 'Name');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

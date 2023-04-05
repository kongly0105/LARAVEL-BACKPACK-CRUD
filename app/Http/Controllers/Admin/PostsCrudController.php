<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Posts::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/posts');
        CRUD::setEntityNameStrings('posts', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn
        ([
            'name' => 'id',
        ]);
        $this->crud->addColumn
        ([
            'name' => 'title',
        ]);
        $this->crud->addColumn
        ([
            'name' => 'content',
        ]);
        $this->crud->addColumn
        ([
            'name' => 'Categories',
        ]);
        $this->crud->addColumn([
            'name' => 'posts_image',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '50px',
            'width' => '50px',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostsRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'type' => 'text',
            'label' => 'Content',
        ]);
        $this->crud->addField([
            'name' => 'categories',
            'type' => 'select',
            'label' => 'Categories',
        ]);
        $this->crud->addField([
            'name' => 'posts_image',
            'type' => 'select_image',
            'label' => 'posts_image',
            'upload' => true
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

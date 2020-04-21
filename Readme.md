# Summary

This is a Dockerised PHP MySQL project built on a custom MVC framework that is used to implement a REST API. This allows users to create companies and assign employees to them. 


# Entities

There are two entities in this project: **company** and  **people**. They have a one to many relationship between the two. Deleting a **company** cascades the operation on all **people**, i.e: Deleting a company will delete all employees in it.

# The Framework

The main goal of this project was to create an MVC project from scratch without using any open source libraries. The functionality of company-addressbook is just an implementation of this framework to test and showcase the abilities of this simple framework.

## Routing

All URLs must follow the REST convention: `/entity/{id}` of URL styling.
"entity" is composed of:
1. A model file: Extends a BaseModel file which implements CRUD functionality using the ORM system.
2. A controller: Extends a BaseController which provides access to the templating system to render pages.
3. A router: Extends BaseRouter which allows the declaration of every URI available for this entity, the request method, the controller and function which are to be called when a request is received.

`$this->add('GET', 'people/{id}', 'PeopleController', 'editView')` shows the route declaration.
When a GET request is made on `people/{id}`, `editView()` in `PeopleController` is called.

The model and router file names must be prefixed with the entity name. ex: PeopleModel.php, PeopleRouter.php which results in a URI like `/people/{id}`.

The routing itself is carried out by the RouteHandler class. It autowires every API call to the respectful entity's controller and calls the controller function with the model and request as arguments.

1. Grabs the request URI, and breaks it down into entity name and id (if exists).
2. The entity name is used to call the entity's model and router. `{entity}Model.php + {entity}Router.php`
3. The entity's router is searched if there is any matching request URI declared, if so, it gets the controller name and the function to be called.
4. The Model class is instantiated. If the request URI had the entity id passed in, then this model instance is populated with the data stored in the database of this model's table with the matching row ID.
5. The controller is instantiated and the matched function is called. The previously instantiated model along with the request are passed in as parameters.

## Model
The model contains two class variables `$columns` and `$table` which correspond to the available field names and the table name respectively. All the field names in the `$columns` array are accessible from the object.

 `$columns = ['name', 'phone'];`
`$model->name;`

**To create a new model:**
`$model = new ModelClassName();`
`$model->create(['name=>'test', 'phone'=>'000']);`
The ordering should be the same as the one defined in `$columns` in the model class.
To save the created object in the database, call the `save()` method. ex: `$model->save();`

**To update a model:**
Use the `update()` method which takes in an associative array of column names and their values. The resulting object is written to the database immediately, without the need to call `save()` separately.

**To retrieve a model from the database:**
Use the `find(id)` method or `getAll()` to return all models.
`$model = new ModelClassName();`
`$model->find(2);` sets contents of  `$model` to those stored in the database.
`$model->getAll()` returns an array containing all models in the table.

**To delete a model:**
Use the `delete()` method.
`$model->delete();`
This erases the table row corresponding to this model.

## Object Relational Model

The class contains all functions required to provide the ability to carry out CRUD functionality between the model and the database.

Since every model class has a `$column` and `$table` variable which store the fillable column names and the table name respectively. These variables accessible in the Database class as it is a parent class of all models.

## Templating
All controllers have access to the templating system. The templating system uses the 'views' folder to render views.

To render a file in  a controller use: `this->view->render('fileName', ['parameter1 => 'value']);`
This grabs `fileName.php` from the 'views' folder, converts it to a string, replaces all parameters with the ones passed in the associative array and echoes this string. The second variable is optional.

`fileName.php`
```html
<html>
<h1> $parameter </h1>
</html>
```

# Setup

> **Note:** Requires Docker and docker-compose to be installed

After cloning the repository, run:
 `docker-compose up`

Afterwards, to create and see the database run:
 `docker exec -i mysql mysql -uuser -ppassword <src/database/dbsetup.sql`


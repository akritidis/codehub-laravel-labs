## Lab 5

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and create some more files with `artisan` tool
- use model binding across controllers
- declare routes with `apiResource`
- add all REST methods for `UsersController`

### Step 1

Launch a brand new VM with Vagrant if you haven't already done so

### Step 2

SSH into the VM and navigate into the Laravel's files and folders

### Step 3

Launch artisan and check the available options

### Step 4

Use model binding for the existing endpoints

### Step 5

Use `apiResource` to declare the routes for `index` and `show` methods of `UsersController`

### Step 6

Use `apiResource` to declare the route for `index` method of `SkillsController`

### Step 7

Use `apiResource` to declare the route for `index` method of `UsersSkillsController`

## Step 8

Add `store`, `update` and `destroy` methods in `UsersController` and declare the appropriate routes

## Step 9

Use Eloquent to create a new `user` through `store` method by passing `firstName`, `lastName`, `email` and `password`

Remember to hash the password before saving it in the DB

Use [curl](https://gist.github.com/subfuzion/08c5d85437d5d4f00e58) to send data to the POST `/users` endpoint

## Step 10

Use Eloquent to update a `user` through `update` method by passing `firstName`, `lastName` and `email`

Use [curl](https://gist.github.com/subfuzion/08c5d85437d5d4f00e58) to send data to the PUT `/users/:id` endpoint

## Step 11

Use Eloquent to delete a `user` through `destroy` method

Use [curl](https://gist.github.com/subfuzion/08c5d85437d5d4f00e58) to use the DELETE `/users/:id` endpoint

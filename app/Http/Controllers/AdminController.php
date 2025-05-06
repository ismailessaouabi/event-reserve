<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;


class AdminController extends Controller
{
    public function allusers(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function allevents(){
        $events = Event::all();
        return view('admin.events', compact('events'));
    }
    public function allcategories(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function showuser($id){
        $user = User::findOrFail($id);
        return view('admin.showuser', compact('user'));
    }
    public function showevent($id){
        $event = Event::findOrFail($id);
        return view('admin.showevent', compact('event'));
    }
    public function showcategory($id){
        $category = Category::findOrFail($id);
        return view('admin.showcategory', compact('category'));
    }
    public function edituser($id){
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }
    public function editevent($id){
        $event = Event::findOrFail($id);
        return view('admin.editevent', compact('event'));
    }
    public function editcategory($id){
        $category = Category::findOrFail($id);
        return view('admin.editcategory', compact('category'));
    }
    public function updateuser($id, Request $request){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
    public function updateevent($id, Request $request){
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('admin.events')->with('success', 'Event updated successfully');
    }
    public function updatecategory($id, Request $request){
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }
    public function destroyuser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
    public function destroyevent($id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events')->with('success', 'Event deleted successfully');
    }
    public function destroycategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }
    public function createuser(){
        return view('admin.createuser');
    }
    public function createevent(){
        return view('admin.createevent');
    }
    public function createcategory(){
        return view('admin.createcategory');
    }
    public function storeuser(Request $request){
        User::create($request->all());
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }
    public function storeevent(Request $request){
        Event::create($request->all());
        return redirect()->route('admin.events')->with('success', 'Event created successfully');
    }
    public function storecategory(Request $request){
        Category::create($request->all());
        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

}

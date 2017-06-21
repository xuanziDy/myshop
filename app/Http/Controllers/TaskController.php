<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

use App\Repositories\TaskRepository;


class TaskController extends Controller
{
	protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
    	$this->middleware('auth'); //注册一个中间件
    	$this->tasks = $tasks;  //实例化的时候就吧该用户的任务都查找出来了
    }

    public function index(Request $request){

    	// $tasks = Task::where('user_id',$request->user()->id)->get();

    	// return view('tasks.index',[
    	// 	'tasks'=>$tasks
    	// ]);
    	// 
    	return  view('tasks.index',[

    		'tasks' => $this->tasks->forUser($request->user())
    	]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|max:255'
    	]);

    	//$request->user() 获取当前登录用户实例
    	$request->user()->tasks()->create([
    		'name'=>$request->name
    	]);

    	return redirect('/tasks');
    }

   


   /**
    *
    *由于路由中的{task}变量与控制器方法中的$task变量相匹配，Laravel的隐式模型绑定特性将会自动注入相应的Task模型实例到destroy方法中。
    *
    * Route::delete('/task/{task}', 'TaskController@destroy');
    * 
    * @param  Request $request [description]
    * @param  Task    $task    [description]
    * @return [type]           [description]
    */
    public function destory(Request $request,Task $task)
    {
    	//传递给authorize方法的第一个参数是我们想要调用的策略方法名，第二个参数是当前操作的模型实例
    	//如果授权成功，代码会继续执行。如果授权失败，会抛出一个403异常并显示一个错误页面给用户。
    	$this->authorize('destory',$task); //使用策略 来判定删除的任务所属人与当前登录用户是否一致

    	$task->delete();

    	if($task->trashed()){
    		return redirect('/tasks');
    	}
    	return redirect('/tasks')->with('error','删除失败');

    	

    }
}

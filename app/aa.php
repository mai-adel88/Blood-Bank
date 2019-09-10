user() // the client who authenticated
$request->user()->governorates()->sync() //many to many notification settings

$request->user()->governorates()->pluck('id')->toArray() //many to many notification settings
$request->user()->bloodTypes()->pluck('id')->toArray() //many to many notification settings

// notifications ->show
				 ->edit

////////
{{-- Token::create([
	'token' =>
	'type'	=>
	'client_id'=>$request->user()->id;
]); --}}
$request->user()->tokens()->create($request->all()); //one to many-> this method simple than the above method
///////////

////////
many to many relation whitch between posts and clients to get favourite only

$request->user()->posts()->paginate() //list of favourits



////////
@inject('client', 'App\Client') //take object from model in view file
////////


////

admin ->test



design




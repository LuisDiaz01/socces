<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
	return view('auth.login');
});
*/

Route::get('/home', 'HomeController@home')->name('home');


Auth::routes();
/*
|	Rutas de verificacion de email
*/ 
Route::get('/Verify',['as'=>'verifi','uses'=>'VerifiController@index']); 
Route::get('/Register/Verify/{code}','VerifiController@verify'); 
/*
| Fin de las rutas de verificacion de email	
*/
/*
| inicio de las rutas de landing page	
*/
Route::get('/', 'LandingController@index')->name('landing.index');
Route::get('/LandingTemplate',['as'=>'landing.template','uses'=>'LandingController@template']);
Route::get('/LandingEncounters',['as'=>'landing.encounter','uses'=>'LandingController@encounter']);
Route::get('/LandingGalery',['as'=>'landing.galery','uses'=>'LandingController@galery']);

/*
| inicio de las rutas de landing page	
*/
/*
|	Middleware for veriry if the user verify email.
*/
Route::group(['middleware'=>['verifiUser']],function(){
	/*
	| Solo para usuarios verificados y logiados 
	| rutas unicamente para modificacion del perfil
	*/
	Route::get('/Profile',['as'=>'profile-index','uses'=>'UsersController@profile']);
	Route::get('/Profile/upDate',['as'=>'profile.upData', 'uses'=>'ProfileController@update'] );
	/*falta el editar para los usuarios*/
	Route::get('/Users/upDate/{id}',['as'=>'Users.up_date','uses'=>'UsersController@update']);
	
/*
|	Admin rol equal 0
*/
	Route::group(['middleware'=>['authen','rol'],'rol_id'=>['1']],function(){

		Route::get('/get_encounter', 'EncounterController@get_encounter');
		Route::get('/api/Type_all',['uses'=>'TypeController@Type_all']);
		/*
		| REPORTES
		*/
		Route::get('/ReportePlantilla', ['as'=>'report.template','uses'=>'DownloadController@plantillas']);
		Route::get('/ReporteInfoClub', ['as'=>'report.info_club','uses'=>'DownloadController@infoClub']);
		Route::get('/ReporteEcuentro', ['as'=>'report.encounter','uses'=>'DownloadController@encuentro']);

		Route::get('/Chart', 'HomeController@chart');

		/*
		|	Start API
		*/
		Route::apiResource('/Club','ClubController');
		Route::apiResource('/Division','DivisionController');
		Route::apiResource('/Encounter','EncounterController');
		Route::apiResource('/Network','NetworkController');
		Route::apiResource('/Post','PostController');
		Route::apiResource('/Rol','RolController'); //controlador costruido
		Route::apiResource('/Stadium','StadiumController');
		Route::apiResource('/Template','TemplateController');
		Route::apiResource('/Users','UsersController');
		
		Route::get('/PostCreate', ['as'=>'Post.create','uses'=>'PostController@create']);
		
		/*
		|	End API
		*/
		/*
		| start Rutas AJAX
		*/
		Route::GET('/User/SearchAtleta','UsersController@searchAtleta');
		/*
		| end Rutas AJAX
		*/

		/*Route::get('/MatterAjax/{id}','MatterUserController@searchMatter');*/
		/*
		//-------------------------------------------EDIT------------------------------------------------
		Route::get('/Matters/upDate/{id}',['as'=>'Matters.up_date','uses'=>'MatterController@update']);
		Route::get('/Matters/edit/{slug}',['as'=>'Matters.edit','uses'=>'MatterController@edit']);
		//-------------------------------------------UPDATE-----------------------------------------------
		Route::get('/MattersAll/upDate/{slug}',['as'=>'Matters.up_date.all','uses'=>'MatterController@updateAll']);
		Route::get('/Contents/upDate/{slug}',['as'=>'Contents.up_date','uses'=>'ContentController@update']);
		Route::get('/Students/upDate/{slug}',['as'=>'Student.up_date','uses'=>'UsersController@Supdate']);
		//------------------------------------------endUPDATE----------------------------------------------
		//--------------------------------------------SHOW-------------------------------------------------
		Route::get('/MattersCareer/Show/{slug}',['as'=>'MattersCareer.show', 'uses'=>'CareerController@MatterCareerShow']);
		Route::get('/MatterUsersCareer/Show/{slug}',['as'=>'MatterUserCareer.show', 'uses'=>'UsersController@showTeacher']);
		Route::get('/Profile/Student/Show/{slug}',['as'=>'Profile.show', 'uses'=>'UsersController@showStudent']);
		Route::get('/Profile/Teacher/Show/{slug}',['as'=>'Profile.Teacher.show', 'uses'=>'TeacherController@show']);
		//------------------------------------------endSHOW------------------------------------------------
		//------------------------------------------DESTROY-----------------------------------------------
		Route::get('/User/Delete/{id}',['as'=>'User.delete','uses'=>'UsersController@destroy']);
		Route::get('/Teacher/Delete/{id}',['as'=>'Teacher.delete','uses'=>'UsersController@destroyTeacher']);
		Route::get('/Areas/Delete/{slug}',['as'=>'Areas.delete', 'uses'=>'AreaController@delete'] );
		Route::get('/University/Delete/{slug}',['as'=>'University.delete', 'uses'=>'UniversityController@delete'] );
		Route::get('/Contents/Delete/{slug}',['as'=>'Contents.delete', 'uses'=>'ContentController@destroy'] );
		Route::get('/Matters/delete/{slug}',['as'=>'Matters.delete','uses'=>'MatterController@destroy']);
		Route::get('/Career/Delete/{slug}',['as'=>'Careers.delete', 'uses'=>'CareerController@delete'] );
		//------------------------------------------endDESTROY--------------------------------------------
		Route::get('/Teacher',['as'=>'Teacher.index','uses'=>'TeacherController@index']);
		Route::get('/AdminVerify/{slug}',['as'=>'admin.verify','uses'=>'VerifiController@AdminVerify']);
		Route::get('/Coordinador',['as'=>'coordinador.index','uses'=>'TeacherController@indexCoordinador']);
		Route::get('/RemoverCargo/{slug}',['as'=>'coordinador.remove','uses'=>'TeacherController@coordinadorRemove']);
		Route::get('/CoordinadorAdd',['as'=>'coordinador.add','uses'=>'TeacherController@coordinadorAdd']);
		Route::post('/MattersUsers/create', ['as'=>'MattersTeacher.add','uses'=>'MatterUserController@add']);
		Route::get('/AddCoordinador',['as'=>'add.coordinador.index','uses'=>'MatterUserController@coordinadorIndex']);
		Route::get('/MattersUsers/search/{dni}','MatterUserController@teacher');
		*/

	});

/*	Route::group(['middleware'=>['authen','rol'],'rol'=>['3']],function(){
		Route::get('/Download/{slug}',['as'=>'Download.index','uses'=>'DownloadController@index']);
		Route::get('/DownloadEquivalencias/{slug}',['as'=>'equivalencia','uses'=>'DownloadController@equivalenciaStudents']);
		
		Route::get('/DownloadAllContent',['as'=>'all.content','uses'=>'DownloadController@search_content']);
	});*/

});
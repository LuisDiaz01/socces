<?php

namespace Club\Http\Controllers;
use Illuminate\Http\Request;
use Club\Http\Requests\DownloadRequests;
use Club\Rules\Captcha;

use Club\contentVersion;
use Club\University;
use Club\StudentMatter;
use Club\MatterUser;
use Club\Download;
use Illuminate\Support\Arr;
use Club\Content;
use Club\Teacher;
use Club\Matter;
use Club\Career;
use Club\Area;
use Carbon\Carbon;
use collect;
use Auth;
use json;
use PDF;
use Validator;
use Illuminate\Support\Collection;
class DownloadController extends Controller{
 
    public function script_paginacion(){
        $script='<script type="text/php">
            if ( isset($pdf) ) {
                $x = 72;
                $y = 810;
                $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}";
                $font = $fontMetrics->get_font("monospace");
                $size = 8;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>';
        return $script;
    }
    public function salto_linea_palabra($campo,$caracteres){
        $palabra=$campo;
        $palabra=explode(' ', $palabra);
        $n= count($palabra);
        $x='';
        $i=0;
        foreach ($palabra as $item) {
            $i++;
            if ($caracteres==$i) {

                $x= $x.' '.$item.'<br>';
                $i=0;
            } else {

                $x= $x.' '.$item;
            }
        }
        $campo=$x;
        $i=0;
        return $campo;
    }
    public function salto_linea_caracters($model,$range=50){
        $long_str=strlen($model);
        $div=round($long_str/$range)-1;
        $palabra='';
        $corte='';
        $count=0;
        $x=0;
        $str=str_split($model);
        for ($i=0;$i<count($str);$i++) { 
            if($count==20){

                $recomponer=explode(' ', $palabra);
                $palabra_completa=$recomponer[0].' '.$recomponer[1];
                $corte=$palabra_completa.'<br>'.$str[$i];
                $palabra=$corte;
                $x++;   
                $count=0;

            }if($i==55){
                dd($corte,$palabra_completa,$recomponer,$palabra,$model,$count);
            }
            else{
                $palabra=$palabra.$str[$i];
                $count++;
            }
        }
        dd($long_str,$count,$palabra); 
        return $palabra;
    }
    public function paginacion_vertical(){
        dd($count_justifucation,$count_purpose,$count_content);
        return $paginacion;
    }
    public function corte($margen,$model_arg,$corte_en,$thead_arg){
        $model=$model_arg;
        $conut_model=$model->count()/$corte_en;
        $i=0;
        $x=0;
        $last_key=0;
        $thead='';
        $paginacion=[];
        foreach ($model as $key => $item) {
            if ($i==$corte_en) {
                for ($q=0; $q < count($thead_arg); $q++) { 
                    $thead= $thead.'<th class="th" colspan=9 Valign="center">
                        <p align=center style="width:10px">
                            <h3>'.$thead_arg[$q]['name'].'</h3>
                        </p>
                    </th>';
                }                
                $html=[
                    'id'=>$key,
                    'html'=>'<table class="table" cellpadding="7"
                        cellspacing="0" 
                        style="margin-top:'.$margen.'cm!important;width:120% !important;
                            min-width: 100% !important;
                            height: 70% !important;
                            min-height: 70% !important;
                            margin-left: -1cm !important;
                            margin-right: 1cm !important;
                            margin-bottom: 2cm !important;
                            position: all;">
                            <col><col><col><col>
                            <thead><tr>'.$thead.'</tr></thead>
                        <tbody>'];
                $paginacion[$x]=Arr::add($html,$x,null);
                $i=0;
                $x++;
                $last_key++;
            }
            else{
                $i++;
            }
            $thead='';
        }
        return $paginacion;
    }
    public function createRegisterDownload(Request $request){
        $rule=['g-recaptcha-response' => new Captcha()];
        $message=[];
        if(Auth::user()){
            $user=Auth::user()->id;
        }else{
            $user=NULL;
        }
        $validator=Validator::make($request->all(), $rule,$message);
        if($validator->fails()){
            $message='Debe Completar el reCatcha';
            return false;
        }else{
            $slug=str_slug('downloand-'.$user.'-'.now().'-equivalencia');
            $user_agent=$request->header('user-agent');
            return  Download::Create([
                'slug'=>$slug,
                'user_id'=>$user,
                'start_student'=>now(),
                'last_student'=>now(),
                'status'=>true,
                'user_agent'=>$user_agent,
                ]);
        }
    }
    public function search_content(Request $request){
        $rule=['last_date' => 'required|date'];
        $message=['last_date'];
        $university=University::find(1);
        $anio=now()->format('yy');
        $year=explode('/',$request->last_date);
        $year=$year[2];
        $validator=Validator::make($request->all(), $rule,$message);
        if($year>$anio || $validator->fails()){
        
            $message='Error con la fecha';
            return back()->with('success','<script>swal({
                icon:"error",
                title:"Error",
                text:"Corrige la fecha de para poder iniciar con la descarga del contenido."
            })</script>');
        }else{
            $career=Career::where('slug',$request->career_slug)->first();
            $matter=Matter::where('career_id',$career->id)->get();
            $i=0; 
            $y=0;
            $contenedorV=[];
            $contenedor=[];
            foreach ($matter as $key => $item) {
                $content=Content::where('matter_id',$item->id)->first();
                $contentV=contentVersion::where('matter_id',$item->id)->first();
                if ($content){
                    $contenedor[$i]=Arr::add($content,$i,null);
                    $i++;

                }elseif($contentV){
                    $contenedorV[$y]=Arr::add($contentV,$y,null);
                    $y++;
                }
            }
            $contenedorFinal=[];
            $acum=[];
            $acumV=[];
            foreach ($contenedor as $key => $item){
                $acum=$item->whereYear('created_at',$year)->get();
                if($acum){
                    $contenedorFinal=Collection::make($acum);
                }
                else{
                    foreach ($contenedorV as $items) {
                        $acumV=$items->whereYear('created_at',$year )->first();
                        $contenedorFinal=Collection::make($acumV);
                    }
                }
            }
            if(!count($contenedorFinal)){
                return back()->with('success','<script>swal({
                icon:"error",
                title:"Error",
                text:"No se encontro Ningun contenido en esta fecha."
            })</script>');
            }else{

            $script=$this->script_paginacion();
            $today=Carbon::now();
            $url=url('/VerificarEquivalencia/');
            $pdf=PDF::loadView('pdf.searchContentDate',compact('contenedorFinal','today','url','script','university'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
            $pdf->download('Contenido_'.Auth::user()->dni.'_'.$request->last_time.'.pdf');
            return $pdf->stream('Equivalencia_'.Auth::user()->dni.'_'.$request->last_time.'.pdf');
            
            }
        }
    }
    public function equivalenciaStudents($slug, Request $request){
        
            $matter_user= StudentMatter::where('user_id',Auth::user()->id)->get();
            $university=University::find(1);
            $i=0;
            foreach ($matter_user as $item) {
                $contentP='';
                $justification='';
                $purpose='';
                $version=$item->version;
                $content=Content::where('version',$version)
                ->where('matter_id',$item->id)->first();
                if(!$content){
                    foreach($item->matter->content as $items){
                        $content_version=contentVersion::where('content_id',$items->id)->get();
                        foreach ($content_version as $item_version) {
                            if ($item_version->version == $version) {
                                $contents[$i]=Arr::add($item_version,$i,null);
                                $contentP=$this->salto_linea_palabra($item_version->content,20);
                                $justification=$this->salto_linea_palabra($item_version->justification,20);
                                $purpose=$this->salto_linea_palabra($item_version->purpose,20);

                                $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );
                            }
                        }
                    }
                }elseif($content){
                    $contents[$i]=Arr::add($content,$i,null);
                    $contentP=$this->salto_linea_palabra($content->content,20);
                    $justification=$this->salto_linea_palabra($content->justification,20);
                    $purpose=$this->salto_linea_palabra($content->purpose,20);
                    $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );
                }
                $i++;
            }
            try {
                $contenidos_paginados=Collection::make($contents);
                $script=$this->script_paginacion();
                $today=Carbon::now();
                if($download==false){
                    return redirect()->route('home')->with('messages','<script>swal({
                    title: "Error!",
                    text: "No completo el reCatcha",
                    icon: "error",
                })</script>');
                }else{
                    $pdf=PDF::loadView('pdf.equivalencia',compact('contents','contenidos_paginados','today','script','university'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
                    $pdf->download('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
                    return $pdf->stream('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
                }
        }catch (\Exception $e) {
            return back()->with('success','<script>swal({
                title: "Error!",
                text: "Se produjo un error al descargar el pdf, verifique de que tenga materias cargadas en el sistema antes de descargar.",
                icon: "error",
            })</script>');
        }
    }
    //descargar pdf de los profesores
    public function adminTeacher(){
        $thead = array(
            ['name' =>'ID'],
            ['name' =>'Nombre'],
            ['name' =>'Apellido'],
            ['name' =>'Cedula'],
            ['name' =>'E-mail'],
            ['name' =>'Cargo'],
            ['name' =>'Creada'],
            ['name' =>'Ultimo inicio de secci??n'],
            );

        $teacher=Teacher::all();
        $today = Carbon::now();
        $university=University::find(1);
        $corte=$this->corte(2,$teacher,18,$thead);
        $script=$this->script_paginacion();
        $url=url('/Teacher');

        $pdf=PDF::loadView('pdf.teacherAll',compact('university','corte','script','teacher','today','url'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        $pdf->download('ReportesDeLosTeacher'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf de las materias
    public function adminMatter(){
        $thead = array(
            ['name' =>'ID'],
            ['name' =>'Area'],
            ['name' =>'Carrera'],
            ['name' =>'Modalidad'],
            ['name' =>'Und. Curricular'],
            ['name' =>'Creada'],
            );
        $matter=Matter::all();
        $university=University::find(1);
        $corte=$this->corte(2,$matter,18,$thead);
        $script=$this->script_paginacion();
        $today = Carbon::now();        
        $url=url('/Matter');
        $pdf=PDF::loadView('pdf.matterAll',compact('university','corte','matter','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        
        $pdf->download('ReportesDeLasMaterias'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf careras 
    public function adminArea(){
        $thead = array(
            ['name' =>'ID'],
            ['name' =>'Area'],
            ['name' =>'Coordenadas'],
            ['name' =>'Creada'],
            );
        $area=Area::all();
        $university=University::find(1);
        $corte=$this->corte(2,$area,16,$thead);
        $script=$this->script_paginacion();
        $today = Carbon::now();
        $url=url('/Areas');
        $pdf=PDF::loadView('pdf.areaAll',compact('university','corte','area','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    public function adminCareer(){
        $thead = array(
            ['name' =>'ID'],
            ['name' =>'Area'],
            ['name' =>'Carrera'],
            ['name' =>'Modalidad'],
            ['name' =>'Creada'],
            );
        $career=Career::all();
        $university=University::find(1);
        $corte=$this->corte(2,$career,16,$thead);
        $script=$this->script_paginacion();
        $today = Carbon::now();
        $url=url('/Careers');
        $pdf=PDF::loadView('pdf.careerAll',compact('university','corte','career','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        $pdf->download('ReportesDeLasCarreras'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf materias y contenido de la materias del profesor correspondiente
    public function teacherMatter($slug){
        $teacher=Teacher::where('user_id',Auth::user()->id)->first();
        $today = Carbon::now();
        $university=University::find(1);
        $url=url('/VerificarDescargaProfesor/'.Auth::user()->id);
        $matter_user=MatterUser::where('user_id',Auth::user()->id)->first();
        $script=$this->script_paginacion();
        $contents=[];
        $content=Content::where('status',1)->first();
        if(!$content){
            return back()->with('success','<script>swal({
            title: "Error!",
          text: "El contenido existente uno esta actualizado o no hay ninguncontenido para esta Und. Curricular",
          icon: "error",
      })</script>');
        }else{
            $contents=Collection::make($content);
            $pdf=PDF::loadView('pdf.matterTeacher',compact('matter_user','content','today','url','script','university'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true,'setIsHtml5ParserEnabled'=>true,'rendered'=>true]);
            
            $pdf->download('ReportesProfesoresMaterias'.now().'.pdf');
            return $pdf->stream();
        }        
    }
    public function CareerPublic($slug){
        $area=Area::where('slug',$slug)->first();
        $json=Career::where('area_id',$area->id)->get();
        return $json;
    }
    public function ContentPublic(Request $request){
        $career=Career::where('slug',$request->career_public_slug)->first();
        $matter=Matter::where('career_id',$career->id)->get();
        $university=University::find(1);
        $i=0;
        $contents=[];
        foreach ($matter as $key => $item) {
            $content=Content::where('matter_id',$item->id)->first();
            if($content){
                $contents[$i]=Arr::add($content,$i,null);
                $contentP=$this->salto_linea_palabra($content->content,20);
                $justification=$this->salto_linea_palabra($content->justification,20);
                $purpose=$this->salto_linea_palabra($content->purpose,20);
                
                $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );
                $i++;
            }
        }
        $cont=Collection::make($contents);
        $script=$this->script_paginacion();
        $download=$this->createRegisterDownload($request);
        if($download==false){
            return back()->with('messages','<script>swal({
                title: "Error!",
                text: "No completo el reCatcha",
                icon: "error",
            })</script>');
        }else{
            $today = Carbon::now();
            $url=url('/VerificarEquivalencia/'.$download->slug);
            $pdf=PDF::loadView('pdf.contentPublic',compact('cont','matter','today','url','script','university'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
            $pdf->download('ContenidosPublicos.pdf');
            return $pdf->stream();
        }


    }
}

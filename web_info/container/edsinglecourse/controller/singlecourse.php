<?php 
class Singlecourse extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = $this->script();
    }
 
    function init(){
        $this->view->dist="";
        $this->view->ct="";
        // $this->view->business = $this->model->getbusiness();
        // $this->view->category = $this->model->getcategories();
        // $this->view->maincategory = $this->model->getmaincategories();
        $this->view->courses = $this->model->getcourses();
        $this->view->render("webtemplate","dotschoolview/coursesingle_view");
    }
    // function category($cat="No Cat"){
    //     $ct = filter_var($cat, FILTER_SANITIZE_STRING);

    //     $this->view->dist="";
    //     $this->view->ct=$ct;
        
    //     $this->view->business = $this->model->getbusiness();
    //     $this->view->category = $this->model->getcategories();
    //     $this->view->maincategory = $this->model->getmaincategories();
    //     $this->view->courses = $this->model->getcoursesbycat($cat);
    //     $this->view->render("webtemplate","dotschoolview/courses_view");
    // }

    // function searchcourse(){
        
    //     $ct = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
    //     $district = filter_var($_POST["district"], FILTER_SANITIZE_STRING);
    //     $date = date('Y-m-d');
    //     $where = "";

    //     if($ct!=""){
    //         $where = " xcat='".$ct."' and xstartdate>='$date' and ";
    //     }

    //     if($district!=""){
    //         $where .= " xvenu='".$district."'  and xstartdate>='$date' and ";
    //     }

    //     if($where==""){
    //         $where = "1=2 and ";
    //     }
    //     // logdebug::appendlog($where);

    //     $this->view->dist=$district;
    //     $this->view->ct=$ct;
    //     $this->view->business = $this->model->getbusiness();
    //     $this->view->category = $this->model->getcategories();
    //     $this->view->maincategory = $this->model->getmaincategories();
    //     $this->view->courses = $this->model->coursesearch($where."zactive=1");
    //     $this->view->render("webtemplate","dotschoolview/courses_view");
    // }

    // function coursedetail($course=0){
    //     $this->view->business = $this->model->getbusiness();
    //     $this->view->category = $this->model->getcategories();
    //     if(!is_numeric($course)){
    //         header('location: '. URL .'courses');
    //     }
    //     $coursedt = $this->model->getcoursedeatil($course);

    //     if(count($coursedt)>0){
    //         $this->view->coursedetail = $coursedt;
    //         $this->view->teacherdt = $this->model->getteacherbyid($coursedt[0]["xteacher"]);
    //     }else{
    //         $this->view->coursedetail = array();
    //     }

    //     $this->view->render("webtemplate","dotschoolview/coursedetail_view");
    // }

    function script(){
        return "
        <script>

        </script>
        ";
    }
}
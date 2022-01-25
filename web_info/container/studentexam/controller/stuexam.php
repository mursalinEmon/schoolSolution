<?php

class Stuexam extends Controller{

	function __construct(){
		parent::__construct();
		
		$this->view->script=$this->script();
		Session::init();
		
        if(!Session::get('loggedIn')){
			
            header('location: '. URL .'studentlogin');
            exit;
        }

	}
	
	function init(){
        Session::init();
		// echo 'test';die;
		$courses = $this->model->getenrolledcourses();
				// Logdebug::appendlog(print_r($courses,true));

		$this->view->courses = $courses;

		$this->view->render("dashboard","abr/stuexam_view");
		
	}

	function getSubjects(){
		// Logdebug::appendlog('test');
        Session::init();
		$studentid=Session::get('suser');
		$student = $this->model->fetchStudent($studentid);
        $student = $student[0];
        $subjects = $this->model->fetchSubjects($student);
        // Logdebug::appendlog(print_r($subjects, true));

        if($subjects)
               echo json_encode(array('message'=>'Subject found Successfully','result'=>'success','keycode'=>$subjects));
            else
               echo json_encode(array('message'=>'Failed to find subject','result'=>'error','keycode'=>''));

	}

	function getlessons(){
		$course = $_POST["courseValue"];
		$lessons = $this->model->getlessons($course);
		// Logdebug::appendlog(print_r($lessons,true));

		if($lessons){
			
			echo json_encode(array('message'=>'Lessons Found','result'=>'success','keycode'=>$lessons));
			
		}else{
			echo json_encode(array('message'=>'Lessons Not Found','result'=>'error','keycode'=>''));
		}
	}

	function setData(){
		$subject = $_POST["subject"];
		// Logdebug::appendlog(print_r($subject,true));
		// $lessonCode = $_POST["lessonValue"];

		Session::set('subject', $subject);
		// Session::set('lessonCode', $lessonCode);

		echo json_encode(array('message'=>'Data Setted','result'=>'success','keycode'=>''));


	}

	function getexams(){
		$subject = $_POST["subjectValue"];
		Session::init();
		$studentid=Session::get('suser');
		$student = $this->model->fetchStudent($studentid);
        $student = $student[0];
		// Logdebug::appendlog(print_r($student,true));
		// $lesson = $_POST["lessonValue"];
		$exams = $this->model->getexams($subject,$student);
		$cudate = date('Y-m-d');
		// Logdebug::appendlog(print_r($cudate,true));
		$availableExams= [];
		foreach($exams as $exam){
			
			if($cudate === $exam['xstartdate']){

				array_push($availableExams,$exam);
				// Logdebug::appendlog(print_r($availableExams,true));
			}

		}
		
		if($availableExams){
			
			echo json_encode(array('message'=>'Exams Found','result'=>'success','keycode'=>$availableExams));
			
		}else{
			echo json_encode(array('message'=>'Exams Not Found','result'=>'error','keycode'=>''));
		}
		
	}

	function getquestions(){
		$course = $_POST["courseValue"];
				// Logdebug::appendlog($course);
		$questions = $this->model->getquestions($course);
				// Logdebug::appendlog(print_r($questions,true));
		
		if($questions){
			echo json_encode(array('message'=>'Questions Found','result'=>'success','keycode'=>$questions));
				
		}else{
			echo json_encode(array('message'=>'Questions Not Found','result'=>'error','keycode'=>''));
		}

		$this->view->questions = $questions;
		$this->view->render("dashboard","abr/stuexam_view");
	}

	

	function getanswers(){
		$questions = $this->model->getquestions();

		$answers = array();
		
				// Logdebug::appendlog(print_r($questions,true));

		foreach($questions as $question){

			$answers[] = $question["xans"];
		}
		// Logdebug::appendlog(print_r($answers,true));

		if($answers){
			
				echo json_encode(array('message'=>'Answers Found','result'=>'success','keycode'=>$answers));
				
			}else{
				echo json_encode(array('message'=>'Answers Not Found','result'=>'error','keycode'=>''));
			}

	}
	
	

	function script(){
		return "
		<script>
		$(document).ready(function(){
				$(\"#attepmExam\").hide();
					$(\"#subjects\").html('<option value=\"\" class=\"text-center col-lg-6\">--Select--</option>');
					$(\"#availableExamInfo\").html('');
					// e.preventDefault();
					// var courseValue = $(this).find(\":selected\").val();
					var url = '".URL."stuexam/getSubjects';

					$.get(url, function(o){
						var subjects = o.keycode;
						console.log(subjects);
						subjects.forEach((item)=>{ 
							// console.log(item.xdesc); 
							$(\"#subjects\").append( '<option class=\"text-center\" value=\"'+item.xsubcode+'\">'+item.xsubname+'</option>' ); })
					}, 'json');
					
					



				$(\"#subjects\").change(function(){
					$(\"#availableExamInfo\").html('');
					// var courseValue = $(\"#courses\").find(\":selected\").val();
					var subjectValue = $(\"#subjects\").find(\":selected\").val();
					
					// console.log(courseValue);
					console.log(subjectValue);

					var url = '".URL."stuexam/getexams';

					$.ajax({
						url:url, 
						type : 'POST',	
						dataType : 'json',					
						data : {subjectValue:subjectValue}, 
						
						success : function(result) {
							console.log(result);
							if(result.result=='success'){
								console.log(result.keycode);
								// console.log(result.keycode[0].xstarttime);
								var availableExam = result.keycode[0];

									var fDate,lDate,cDate,Cdate;
									fDate = availableExam.xstartdate; // startdate
									cDate = new Date(); // date
									Cdate = cDate.getDate();
									Cmonth = (cDate.getMonth()+1);
									if(Cdate<10){
										Cdate = '0'+ Cdate;
									}else{
										Cdate =Cdate
									}
									if(Cmonth<10){
										Cmonth = '0'+ Cmonth;
									}else{
										Cmonth = Cmonth
									}
									lDate = availableExam.xenddate;
									today = cDate.getFullYear() + \"-\" + Cmonth + \"-\" + Cdate;
									// console.log(today);
									// if(today == lDate && today == fDate){
									// 	test(availableExam.xstarttime, availableExam.xendtime);
									// }
									if(availableExam){
										test(availableExam.xstarttime, availableExam.xendtime,availableExam);
									}
							
								
								
								// test(\"20:02:55\", \"21:02:55\");

								function test(start_time, end_time,availableExam) {
									// console.log(start_time);
									// console.log(end_time);
									var dt = new Date();
									var todaystr = today.replace(/\-/g,'');
									var startdate = availableExam.xstartdate.replace(/\-/g,'');
									// console.log('today '+todaystr);
									// console.log('exam date '+startdate);
									// if(todaystr > startdate){
									// 	console.log('Date past');
									// }else{
									// 	console.log('Date has not past');
									// }
									//convert both time into timestamp
									var stt = new Date((dt.getMonth() + 1) + \"/\" + dt.getDate() + \"/\" + dt.getFullYear() + \" \" + start_time);
									console.log(stt);


									stt = stt.getTime();
									console.log(stt);

									var endt = new Date((dt.getMonth() + 1) + \"/\" + dt.getDate() + \"/\" + dt.getFullYear() + \" \" + end_time);
									endt = endt.getTime();

									var time = dt.getTime();

									if(today==availableExam.xstartdate){
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">Start Date : Today</h5>'
										);
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">Start Time : '+availableExam.xstarttime+'</h5>'
										);
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">End Time : '+availableExam.xendtime+'</h5>'
										);
											if(today==availableExam.xstartdate && time > stt && time < endt){

												$(\"#attepmExam\").show();
												$(\"#attepmExam\").css({\"width\":\"30%\",\"margin-left\":\"2rem\"});
											}else{
												$(\"#attepmExam\").hide();
												$(\"#availableExamInfo\").append(
													'<h5 class=\"card-title\">Exam Expired!</h5>'
												);
											}

									} else if(todaystr > startdate){
										
										$(\"#attepmExam\").hide();
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">Exam Expired!</h5>'
										);

									}else{
										$(\"#attepmExam\").hide();

										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">Start Date : '+availableExam.xstartdate+'</h5>'
										);
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">Start Time : '+availableExam.xstarttime+'</h5>'
										);
										$(\"#availableExamInfo\").append(
											'<h5 class=\"card-title\">End Time : '+availableExam.xendtime+'</h5>'
										);

									}
								}


								
							}else{
								$(\"#attepmExam\").hide();
								$(\"#availableExamInfo\").append(
									'<h5 class=\"card-title\">No Exam Available</h5>'
								);
								
							}

							
							   
							
									
						},
						error: function(xhr, resp, text) {
							console.log(xhr, resp, text);
						}
					});


				});

				$(\"#attepmExam\").button().click(function(){
					console.log('test');
					var subject = $(\"#subjects\").find(\":selected\").val();
					// var lessonValue = $(\"#lessons\").find(\":selected\").val();
					// console.log(courseValue);
					// console.log(lessonValue);
					var url = '".URL."stuexam/setData';
					
					$.ajax({
						url:url, 
						type : 'POST',	
						dataType : 'json',					
						data : {subject:subject}, 
						
						success : function(result) {
							
							// console.log(result);
							var lessons = result.keycode;

							if(result.result=='success'){
								
								window.location.href = '".URL."stuexamquestion';                          
								

								
							}else{
								
								
								
							}
							   
							
									
						},
						error: function(xhr, resp, text) {
							console.log(xhr, resp, text);
						}
					});

				});


			$('#anssubmit').submit(function(e){
		 		// e.preventDefault();

				var submittedAns = [];

				//  console.log($(\"input[type='radio']:checked\"));
				 $($(\"input[type='radio']:checked\")).each((e,f)=>{
					// console.log(e,f.value);
					submittedAns.push(f.value);

				 });

				// console.log(submittedAns);

				$.ajax({
                        
					url:\"".URL."stuexam/getanswers\", 
					type : \"GET\",
					 
					
					beforeSend:function(){	
						// loaderon();   
						
					},
					success : function(result) {
						// loaderoff();
						const resultobj = JSON.parse(result);

						if(resultobj['result']=='success'){
							var correctResult = [];
							var answers = resultobj['keycode'];
							for (var i=0; i<answers.length; i++){
								correctResult.push(answers[i] - submittedAns[i]);
								if(correctResult[i]=='0'){
									correctResult[i]=1;
								}else{
									correctResult[i]=0;
								}
							}
							console.log(correctResult);
						}
						
						
					},error: function(xhr, resp, text) {
						// loaderoff();
						
					}
				})
				
			});
			
			
	   
		});
	
		</script>
		";
	}
} 
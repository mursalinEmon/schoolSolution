<?php

class Venumaster extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	function init(){
		
		Session::set('retailertoken',uniqid());
        $this->view->token=Session::get('retailertoken');       
		$this->view->render("templateadmin","abr/venu_view");
		
	}

	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(      				
			"district"=>array("ctrlfield"=>"xdistrict"),
			"thana"=>array("ctrlfield"=>"xthana"),
			"capacity"=>array("ctrlfield"=>"xcapacity"),
			"venu"=>array("ctrlfield"=>"xvenu"),			
			"address"=>array("ctrlfield"=>"xaddress"),
			
		);
	}

	
	function createvenu(){
		
		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		
		try{
			
			
			$inputs = new Form();
			
			$inputs ->post("district")
					->val('minlength', 2)
					
					->post("thana")
					->val('minlength', 2)
                    
                    ->post("capacity")
			
					->post("venu")

					->post("address");
					
			$inputs	->submit(); 		

			$inpdata = $inputs->fetch(); 
			
			$data = Apptools::form_field_to_data($inpdata, $this->formfield); 

			$data['bizid']=100;

			$data['zactive']=1;
			
			$data['zemail']=Session::get('suser'); //Logdebug::appendlog(serialize($data));

			$success = $this->model->create("eduvenu",$data);
			//$success = 1;
			if($success>0){

				echo json_encode(array('result'=>'success','message'=>'Venu created successfully!'));
			}
			else{	
				echo json_encode(array('result'=>'error','message'=>'Unable to create ODC!'));
			}

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
			
		}
		
	}
	
	
	

	function script(){
		return "
		<script>
		$(document).ready(function(e){
			
			$('#venuform').on('submit',(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
		
				$.ajax({
					type:'POST',
					url:\"".URL."venusettings/createvenu\", 
					data:formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(result){
						const resultobj = JSON.parse(result);
						//console.log(result)
						if(resultobj['result']=='success'){
							$('#resultalert').removeClass('alert-dark')
							$('#resultalert').removeClass('alert-danger')
							
							$('#resultalert').html(resultobj['message'])
							$('#resultalert').addClass('alert-success')
						}else{
							$('#resultalert').removeClass('alert-dark')
							
							$('#resultalert').removeClass('alert-success')
							$('#resultalert').html(resultobj['message'])
							$('#resultalert').addClass('alert-danger')
						}
					},
					error: function(data){
						
						console.log(data);
					}
				});
			}));

			$('#btnclear').on('click', function(){
				$('#venuform').trigger('reset');
			})

			
		
		 var districts = [	'Dhaka', 'Faridpur','Gazipur','Gopalganj','Jamalpur','Kishoreganj',	'Madaripur',	
		 'Manikganj','Munshiganj','Mymensingh','Narayanganj','Narshingdi','Netrakona','Rajbari','Shariatpur',	
		 'Sherpur',	'Tangail','Bogra','Chapinawabganj',	'Joypurhat','Naogaon','Natore',	'Pabna','Rajshahi',	
		 'Sirajganj','Dinajpur','Gaibandha','Kurigram',	'Lalmonirhat', 'Nilphamari','Panchagarh','Rangpur',	
		 'Thakurgaon', 'Bandarban',	'Brahmanbaria',	'Chandpur',	'Chittagong','Comilla','Cox’s Bazar',	
		 'Feni','Khagrachari','Lakshmipur','Noakhali','Rangamati','Hobiganj','Moulvibazar','Sunamganj',	
		 'Sylhet','Chuadanga','Bagherhat','Jessore','Jinaidaha','Khulna','Kustia','Magura',	'Meherpur',	
		 'Narail','Satkhira','Barguna','Barishal','Bhola','Jhalokathi',	'Patuakhali','Pirojpur'	
		];
		 $('#district').append('<option></option>');
		 $.each(districts,function(key,val){
			 $('#district').append('<option>'+val.toUpperCase()+'</option>');			
		})
		 
		 var thana = [
			{District:'BAGERHAT', upazilla:'MOLLAHAT'},
			{District:'BAGERHAT', upazilla:'RAMPAL'},
			{District:'BAGERHAT', upazilla:'MONGLA'},
			{District:'BAGERHAT', upazilla:'MORALGANJ'},
			{District:'BAGERHAT', upazilla:'FAKIRHAT'},
			{District:'BAGERHAT', upazilla:'KACHUA'},
			{District:'BAGERHAT', upazilla:'CHITALMARI'},
			{District:'BAGERHAT', upazilla:'BAGERHAT SADAR'},
			{District:'BAGERHAT', upazilla:'SARANKHOLA'},
			{District:'BANDARBAN', upazilla:'ALIKADAM'},
			{District:'BANDARBAN', upazilla:'RUMA'},
			{District:'BANDARBAN', upazilla:'BANDARBAN SADAR'},
			{District:'BANDARBAN', upazilla:'THANCHI'},
			{District:'BANDARBAN', upazilla:'ROWANGCHARI'},
			{District:'BANDARBAN', upazilla:'LAMA'},
			{District:'BARGUNA', upazilla:'PATHARGHATA'},
			{District:'BARGUNA', upazilla:'BARGUNA SADAR'},
			{District:'BARGUNA', upazilla:'BETAGI'},
			{District:'BARGUNA', upazilla:'AMTALI'},
			{District:'BARISHAL', upazilla:'GOURNADI'},
			{District:'BARISHAL', upazilla:'HIZLA'},
			{District:'BARISHAL', upazilla:'BARISHAL SADAR'},
			{District:'BARISHAL', upazilla:'MULADI'},
			{District:'BARISHAL', upazilla:'AGAILJHARA'},
			{District:'BARISHAL', upazilla:'BABUGANJ'},
			{District:'BARISHAL', upazilla:'WAZIRPUR'},
			{District:'BARISHAL', upazilla:'BANARIPARA'},
			{District:'BARISHAL', upazilla:'BAKERGANJ'},
			{District:'BHOLA', upazilla:'TAZUMUDDIN'},
			{District:'BHOLA', upazilla:'BORHANUDDIN'},
			{District:'BHOLA', upazilla:'MONPURA'},
			{District:'BHOLA', upazilla:'LALMOHAN'},
			{District:'BHOLA', upazilla:'DAULATKHAN'},
			{District:'BHOLA', upazilla:'CHARFESSON'},
			{District:'BOGURA', upazilla:'DHUNAT'},
			{District:'BOGURA', upazilla:'SHIBGANJ'},
			{District:'BOGURA', upazilla:'ADAMDIGHI'},
			{District:'BOGURA', upazilla:'NANDIGRAM'},
			{District:'BOGURA', upazilla:'SONATOLA'},
			{District:'BOGURA', upazilla:'SARIAKANDI'},
			{District:'BOGURA', upazilla:'SHAJAHANPUR'},
			{District:'BOGURA', upazilla:'BOGURA SADAR'},
			{District:'BOGURA', upazilla:'SARIAKANDI'},
			{District:'BOGURA', upazilla:'KAHALOO'},
			{District:'BOGURA', upazilla:'GABTALI'},
			{District:'BOGURA', upazilla:'SHERPUR'},
			{District:'BOGURA', upazilla:'DUPCHANCHIA'},
			{District:'BRAHMANBARIA', upazilla:'BRAHMANBARIA SADAR'},
			{District:'BRAHMANBARIA', upazilla:'ASHUGANJ'},
			{District:'BRAHMANBARIA', upazilla:'SARAIL'},
			{District:'BRAHMANBARIA', upazilla:'NABINAGAR'},
			{District:'BRAHMANBARIA', upazilla:'BANCHARAMPUR'},
			{District:'BRAHMANBARIA', upazilla:'BIJOYNAGAR'},
			{District:'BRAHMANBARIA', upazilla:'NASIRNAGAR'},
			{District:'BRAHMANBARIA', upazilla:'KASBA'},
			{District:'CHANDPUR', upazilla:'HAJIGANJ'},
			{District:'CHANDPUR', upazilla:'CHANDPUR SADAR'},
			{District:'CHANDPUR', upazilla:'HAIMCHAR'},
			{District:'CHANDPUR', upazilla:'FARIDGANJ'},
			{District:'CHANDPUR', upazilla:'MATLAB (NORTH)'},
			{District:'CHANDPUR', upazilla:'SHAHRASTI'},
			{District:'CHAPAINAWABGANJ', upazilla:'NACHOLE'},
			{District:'CHAPAINAWABGANJ', upazilla:'CHAPAINAWABGANJ SADAR'},
			{District:'CHATTOGRAM', upazilla:'FATIKCHARI'},
			{District:'CHATTOGRAM', upazilla:'RANGUNIA'},
			{District:'CHATTOGRAM', upazilla:'SATKANIA'},
			{District:'CHATTOGRAM', upazilla:'SITAKUNDA'},
			{District:'CHATTOGRAM', upazilla:'MIRSHARAI'},
			{District:'CHATTOGRAM', upazilla:'HATHAZARI'},
			{District:'CHATTOGRAM', upazilla:'ANWARA'},
			{District:'CHATTOGRAM', upazilla:'PATIYA'},
			{District:'CHATTOGRAM', upazilla:'CHANDANAISH'},
			{District:'CHATTOGRAM', upazilla:'RAWZAN'},
			{District:'CHATTOGRAM', upazilla:'KARNAFULI'},
			{District:'CHATTOGRAM', upazilla:'BOALKHALI'},
			{District:'CHATTOGRAM', upazilla:'BANSHKHALI'},
			{District:'CHUADANGA', upazilla:'JIBANNAGAR'},
			{District:'COXS BAZAR', upazilla:'KUTUBDIA'},
			{District:'COXS BAZAR', upazilla:'PEKUA'},
			{District:'COXS BAZAR', upazilla:'COXS BAZAR SADAR'},
			{District:'COXS BAZAR', upazilla:'UKHIA'},
			{District:'COXS BAZAR', upazilla:'TEKNAF'},
			{District:'COXS BAZAR', upazilla:'MAHESHKHALI'},
			{District:'COXS BAZAR', upazilla:'RAMU'},
			{District:'CUMILLA', upazilla:'MEGHNA'},
			{District:'CUMILLA', upazilla:'MONOHARGANJ'},
			{District:'CUMILLA', upazilla:'BURICHANG'},
			{District:'CUMILLA', upazilla:'MURADNAGAR'},
			{District:'CUMILLA', upazilla:'ADARSHA SADAR'},
			{District:'CUMILLA', upazilla:'DEBIDWAR'},
			{District:'CUMILLA', upazilla:'CUMILLA SADAR(SOUTH)'},
			{District:'CUMILLA', upazilla:'LAKSAM'},
			{District:'CUMILLA', upazilla:'NANGOLKOT'},
			{District:'CUMILLA', upazilla:'CHOUDDAGRAM'},
			{District:'CUMILLA', upazilla:'HOMNA'},
			{District:'CUMILLA', upazilla:'LALMAI'},
			{District:'CUMILLA', upazilla:'BRAHMANPARA'},
			{District:'CUMILLA', upazilla:'TITAS'},
			{District:'CUMILLA', upazilla:'DAUDKANDI'},
			{District:'DHAKA', upazilla:'KERANIGANJ'},
			{District:'DHAKA', upazilla:'DOHAR'},
			{District:'DHAKA', upazilla:'NAWABGANJ'},
			{District:'DHAKA', upazilla:'DHAMRAI'},
			{District:'DHAKA', upazilla:'SAVAR'},
			{District: 'DHAKA', upazilla:'ADABOR'},
			{District: 'DHAKA', upazilla:'BADDA'},
			{District: 'DHAKA', upazilla:'BANDAR'},
			{District: 'DHAKA', upazilla:'BANGSHAL'},
			{District: 'DHAKA', upazilla:'BIMAN BANDAR'},
			{District: 'DHAKA', upazilla:'CANTONMENT'},
			{District: 'DHAKA', upazilla:'CHAWKBAZAR'},
			{District: 'DHAKA', upazilla:'DAKSHINKHAN'},
			{District: 'DHAKA', upazilla:'DARUS SALAM'},
			{District: 'DHAKA', upazilla:'DEMRA'},
			{District: 'DHAKA', upazilla:'DHANMONDI'},
			{District: 'DHAKA', upazilla:'GAZIPUR SADAR'},
			{District: 'DHAKA', upazilla:'GENDARIA'},
			{District: 'DHAKA', upazilla:'GULSHAN'},
			{District: 'DHAKA', upazilla:'HAZARIBAGH'},
			{District: 'DHAKA', upazilla:'JATRABARI'},
			{District: 'DHAKA', upazilla:'KADAMTALI'},
			{District: 'DHAKA', upazilla:'KAFRUL'},
			{District: 'DHAKA', upazilla:'KALABAGAN'},
			{District: 'DHAKA', upazilla:'KAMRANGIRCHAR'},
			{District: 'DHAKA', upazilla:'KERANIGANJ'},
			{District: 'DHAKA', upazilla:'KHILGAON'},
			{District: 'DHAKA', upazilla:'KHILKHET'},
			{District: 'DHAKA', upazilla:'KOTWALI'},
			{District: 'DHAKA', upazilla:'LALBAGH'},
			{District: 'DHAKA', upazilla:'MIRPUR'},
			{District: 'DHAKA', upazilla:'MOHAMMADPUR'},
			{District: 'DHAKA', upazilla:'MOTIJHEEL'},
			{District: 'DHAKA', upazilla:'NARAYANGANJ SADAR'},
			{District: 'DHAKA', upazilla:'NEW MARKET'},
			{District: 'DHAKA', upazilla:'PALLABI'},
			{District: 'DHAKA', upazilla:'PALTAN'},
			{District: 'DHAKA', upazilla:'RAMNA'},
			{District: 'DHAKA', upazilla:'RAMPURA'},
			{District: 'DHAKA', upazilla:'SABUJBAGH'},
			{District: 'DHAKA', upazilla:'SAVAR'},
			{District: 'DHAKA', upazilla:'SHAH ALI'},
			{District: 'DHAKA', upazilla:'SHAHBAGH'},
			{District: 'DHAKA', upazilla:'SHER-E-BANGLA NAGAR'},
			{District: 'DHAKA', upazilla:'SHYAMPUR'},
			{District: 'DHAKA', upazilla:'SUTRAPUR'},
			{District: 'DHAKA', upazilla:'TEJGAON'},
			{District: 'DHAKA', upazilla:'TEJGAON'},
			{District: 'DHAKA', upazilla:'TURAG'},
			{District: 'DHAKA', upazilla:'UTTARA'},
			{District: 'DHAKA', upazilla:'UTTAR KHAN'},
			{District:'DINAJPUR', upazilla:'BIRGANJ'},
			{District:'DINAJPUR', upazilla:'DINAJPUR SADAR'},
			{District:'DINAJPUR', upazilla:'BOCHAGANJ'},
			{District:'DINAJPUR', upazilla:'BIRAMPUR'},
			{District:'DINAJPUR', upazilla:'KHANSAMA'},
			{District:'DINAJPUR', upazilla:'HAKIMPUR'},
			{District:'DINAJPUR', upazilla:'GHORAGHAT'},
			{District:'DINAJPUR', upazilla:'CHIRIRBANDAR'},
			{District:'DINAJPUR', upazilla:'PARBATIPUR'},
			{District:'DINAJPUR', upazilla:'KAHAROLE'},
			{District:'DINAJPUR', upazilla:'NAWABGANJ'},
			{District:'DINAJPUR', upazilla:'FULBARI'},
			{District:'FARIDPUR', upazilla:'CHAR BHADRASAN'},
			{District:'FARIDPUR', upazilla:'SALTHA'},
			{District:'FARIDPUR', upazilla:'BHANGA'},
			{District:'FARIDPUR', upazilla:'FARIDPUR SADAR'},
			{District:'FARIDPUR', upazilla:'BOALMARI'},
			{District:'FARIDPUR', upazilla:'MADHUKHALI'},
			{District:'FARIDPUR', upazilla:'NAGARKANDA'},
			{District:'FARIDPUR', upazilla:'SADARPUR'},
			{District:'FENI', upazilla:'CHAGALNAIYA'},
			{District:'FENI', upazilla:'FULGAZI'},
			{District:'FENI', upazilla:'FENI SADAR'},
			{District:'GAIBANDHA', upazilla:'SUNDARGANJ'},
			{District:'GAIBANDHA', upazilla:'PALASHBARI'},
			{District:'GAIBANDHA', upazilla:'GOBINDAGANJ'},
			{District:'GAIBANDHA', upazilla:'GAIBANDHA SADAR'},
			{District:'GAZIPUR', upazilla:'GAZIPUR SADAR'},
			{District:'GAZIPUR', upazilla:'KALIGANJ'},
			{District:'GAZIPUR', upazilla:'KAPASIA'},
			{District:'GAZIPUR', upazilla:'KALIAKAIR'},
			{District:'GAZIPUR', upazilla:'SREEPUR'},
			{District:'GOPALGANJ', upazilla:'TUNGIPARA'},
			{District:'GOPALGANJ', upazilla:'KOTALIPARA'},
			{District:'GOPALGANJ', upazilla:'GOPALGANJ SADAR'},
			{District:'GOPALGANJ', upazilla:'MAKSUDPUR'},
			{District:'HABIGANJ', upazilla:'CHUNARUGHAT'},
			{District:'HABIGANJ', upazilla:'SHAYESTAGANJ'},
			{District:'HABIGANJ', upazilla:'BAHUBAL'},
			{District:'HABIGANJ', upazilla:'MADHABPUR'},
			{District:'HABIGANJ', upazilla:'AJMIRIGANJ'},
			{District:'HABIGANJ', upazilla:'NABIGANJ'},
			{District:'HABIGANJ', upazilla:'HABIGANJ SADAR'},
			{District:'HABIGANJ', upazilla:'LAKHAI'},
			{District:'HABIGANJ', upazilla:'BANIACHONG'},
			{District:'JAMALPUR', upazilla:'JAMALPUR SADAR'},
			{District:'JAMALPUR', upazilla:'MADARGANJ'},
			{District:'JAMALPUR', upazilla:'MELANDAH'},
			{District:'JAMALPUR', upazilla:'ISLAMPUR'},
			{District:'JASHORE', upazilla:'KESHABPUR'},
			{District:'JASHORE', upazilla:'JHIKARGACHA'},
			{District:'JASHORE', upazilla:'SHARSHA'},
			{District:'JASHORE', upazilla:'CHOUGACHHA'},
			{District:'JASHORE', upazilla:'MANIRAMPUR'},
			{District:'JHALAKATHI', upazilla:'NALCHITY'},
			{District:'JHALAKATHI', upazilla:'RAJAPUR'},
			{District:'JHALAKATHI', upazilla:'JHALAKATHI SADAR'},
			{District:'JHALAKATHI', upazilla:'KATHALIA'},
			{District:'JHENAIDAH', upazilla:'SHAILKUPA'},
			{District:'JHENAIDAH', upazilla:'MOHESHPUR'},
			{District:'JHENAIDAH', upazilla:'SHAILKUPA'},
			{District:'JHENAIDAH', upazilla:'KOTCHANDPUR'},
			{District:'JHENAIDAH', upazilla:'HARINAKUNDA'},
			{District:'JHENAIDAH', upazilla:'KALIGANJ'},
			{District:'JOYPURHAT', upazilla:'JOYPURHAT SADAR'},
			{District:'JOYPURHAT', upazilla:'PANCHBIBI'},
			{District:'JOYPURHAT', upazilla:'AKKELPUR'},
			{District:'JOYPURHAT', upazilla:'KHETLAL'},
			{District:'JOYPURHAT', upazilla:'KALAI'},
			{District:'KHAGRACHARI', upazilla:'LAXMICHHARI'},
			{District:'KHAGRACHARI', upazilla:'GUIMARA'},
			{District:'KHAGRACHARI', upazilla:'MATIRANGA'},
			{District:'KHAGRACHARI', upazilla:'PANCHHARI'},
			{District:'KHAGRACHARI', upazilla:'MOHALCHARI'},
			{District:'KHAGRACHARI', upazilla:'MANIKCHHARI'},
			{District:'KHAGRACHARI', upazilla:'DIGHINALA'},
			{District:'KHAGRACHARI', upazilla:'RAMGARH'},
			{District:'KHULNA', upazilla:'TEROKHADA'},
			{District:'KHULNA', upazilla:'BATIAGHATA'},
			{District:'KHULNA', upazilla:'DACOPE'},
			{District:'KHULNA', upazilla:'DIGHOLIA'},
			{District:'KHULNA', upazilla:'KOYRA'},
			{District:'KHULNA', upazilla:'DUMURIA'},
			{District:'KHULNA', upazilla:'FULTALA'},
			{District:'KISHOREGANJ', upazilla:'KATIADI'},
			{District:'KISHOREGANJ', upazilla:'KISHOREGANJ SADAR'},
			{District:'KISHOREGANJ', upazilla:'KARIMGANJ'},
			{District:'KISHOREGANJ', upazilla:'KULIARCHAR'},
			{District:'KISHOREGANJ', upazilla:'TARAIL'},
			{District:'KISHOREGANJ', upazilla:'BHAIRAB'},
			{District:'KISHOREGANJ', upazilla:'HOSSAINPUR'},
			{District:'KISHOREGANJ', upazilla:'MITHAMOIN'},
			{District:'KISHOREGANJ', upazilla:'ITNA'},
			{District:'KISHOREGANJ', upazilla:'PAKUNDIA'},
			{District:'KURIGRAM', upazilla:'KURIGRAM SADAR'},
			{District:'KURIGRAM', upazilla:'FULBARI'},
			{District:'KURIGRAM', upazilla:'RAJIBPUR'},
			{District:'KURIGRAM', upazilla:'BHURUNGAMARI'},
			{District:'KURIGRAM', upazilla:'ULIPUR'},
			{District:'KUSHTIA', upazilla:'KUSHTIA SADAR'},
			{District:'KUSHTIA', upazilla:'KUMARKHALI'},
			{District:'KUSHTIA', upazilla:'MIRPUR'},
			{District:'KUSHTIA', upazilla:'KHOKSA'},
			{District:'KUSHTIA', upazilla:'BHERAMARA'},
			{District:'KUSHTIA', upazilla:'DAULATPUR'},
			{District:'LALMONIRHAT', upazilla:'PATGRAM'},
			{District:'LALMONIRHAT', upazilla:'KALIGANJ'},
			{District:'LALMONIRHAT', upazilla:'LALMONIRHAT SADAR'},
			{District:'LALMONIRHAT', upazilla:'HATIBANDHA'},
			{District:'LAXMIPUR', upazilla:'RAIPUR'},
			{District:'LAXMIPUR', upazilla:'LAXMIPUR SADAR'},
			{District:'LAXMIPUR', upazilla:'KAMALNAGAR'},
			{District:'LAXMIPUR', upazilla:'RAMGANJ'},
			{District:'MADARIPUR', upazilla:'KALKINI'},
			{District:'MADARIPUR', upazilla:'SHIBCHAR'},
			{District:'MADARIPUR', upazilla:'RAJOIR'},
			{District:'MADARIPUR', upazilla:'MADARIPUR SADAR'},
			{District:'MAGURA', upazilla:'SREEPUR'},
			{District:'MAGURA', upazilla:'SHALIKHA'},
			{District:'MAGURA', upazilla:'SREEPUR'},
			{District:'MAGURA', upazilla:'MAGURA SADAR'},
			{District:'MANIKGANJ', upazilla:'SINGAIR'},
			{District:'MANIKGANJ', upazilla:'GHIOR'},
			{District:'MANIKGANJ', upazilla:'SHIBALAY'},
			{District:'MANIKGANJ', upazilla:'SATURIA'},
			{District:'MANIKGANJ', upazilla:'HARIRAMPUR'},
			{District:'MANIKGANJ', upazilla:'MANIKGANJ SADAR'},
			{District:'MANIKGANJ', upazilla:'DAULATPUR'},
			{District:'MEHERPUR', upazilla:'MEHERPUR SADAR'},
			{District:'MOULVIBAZAR', upazilla:'BARALEKHA'},
			{District:'MOULVIBAZAR', upazilla:'MOULVIBAZAR SADAR'},
			{District:'MOULVIBAZAR', upazilla:'JURI'},
			{District:'MOULVIBAZAR', upazilla:'SREEMANGAL'},
			{District:'MOULVIBAZAR', upazilla:'KULAURA'},
			{District:'MOULVIBAZAR', upazilla:'RAJNAGAR'},
			{District:'MUNSHIGANJ', upazilla:'GAJARIA'},
			{District:'MUNSHIGANJ', upazilla:'MUNSHIGANJ SADAR'},
			{District:'MUNSHIGANJ', upazilla:'TONGIBARI'},
			{District:'MUNSHIGANJ', upazilla:'SERAJDIKHAN'},
			{District:'MUNSHIGANJ', upazilla:'LOUHAJONG'},
			{District:'MUNSHIGANJ', upazilla:'SREENAGAR'},
			{District:'MYMENSINGH', upazilla:'DHOBAURA'},
			{District:'MYMENSINGH', upazilla:'FULPUR'},
			{District:'MYMENSINGH', upazilla:'TRISHAL'},
			{District:'MYMENSINGH', upazilla:'ISHWARGONJ'},
			{District:'MYMENSINGH', upazilla:'BHALUKA'},
			{District:'MYMENSINGH', upazilla:'NANDAIL'},
			{District:'MYMENSINGH', upazilla:'MYMENSINGH SADAR'},
			{District:'MYMENSINGH', upazilla:'GAFFARGAON'},
			{District:'MYMENSINGH', upazilla:'TARAKANDA'},
			{District:'MYMENSINGH', upazilla:'HALUAGHAT'},
			{District:'NAOGAON', upazilla:'DHAMOIRHAT'},
			{District:'NAOGAON', upazilla:'NIAMATPUR'},
			{District:'NAOGAON', upazilla:'PORSHA'},
			{District:'NAOGAON', upazilla:'ATRAI'},
			{District:'NAOGAON', upazilla:'MOHADEVPUR'},
			{District:'NAOGAON', upazilla:'SAPAHAR'},
			{District:'NAOGAON', upazilla:'NAOGAON SADAR'},
			{District:'NAOGAON', upazilla:'RANINAGAR'},
			{District:'NARAIL', upazilla:'KALIA'},
			{District:'NARAIL', upazilla:'LOHAGARA'},
			{District:'NARAIL', upazilla:'NARAIL SADAR'},
			{District:'NARAYANGANJ', upazilla:'BANDAR'},
			{District:'NARAYANGANJ', upazilla:'NARAYANGANJ SADAR'},
			{District:'NARAYANGANJ', upazilla:'ARAIHAZAR'},
			{District:'NARAYANGANJ', upazilla:'RUPGANJ'},
			{District:'NARAYANGANJ', upazilla:'SONARGAON'},
			{District:'NARAYANGANJ', upazilla:'NARAYANGANJ SADAR'},
			{District:'NARSINGDI', upazilla:'MONOHARDI'},
			{District:'NARSINGDI', upazilla:'PALASH'},
			{District:'NARSINGDI', upazilla:'BELABO'},
			{District:'NARSINGDI', upazilla:'RAIPURA'},
			{District:'NARSINGDI', upazilla:'SHIBPUR'},
			{District:'NARSINGDI', upazilla:'NARSINGDI SADAR'},
			{District:'NATORE', upazilla:'NALDANGA'},
			{District:'NATORE', upazilla:'GURUDASPUR'},
			{District:'NATORE', upazilla:'LALPUR'},
			{District:'NATORE', upazilla:'BAGATIPARA'},
			{District:'NATORE', upazilla:'BARAIGRAM'},
			{District:'NATORE', upazilla:'SINGRA'},
			{District:'NETROKONA', upazilla:'KENDUA'},
			{District:'NETROKONA', upazilla:'MADAN'},
			{District:'NETROKONA', upazilla:'KHALIAJURI'},
			{District:'NETROKONA', upazilla:'KALMA KANDA'},
			{District:'NILPHAMARI', upazilla:'SYEDPUR'},
			{District:'NILPHAMARI', upazilla:'DOMAR'},
			{District:'NILPHAMARI', upazilla:'JALDHAKA'},
			{District:'NILPHAMARI', upazilla:'NILPHAMARI SADAR'},
			{District:'NILPHAMARI', upazilla:'KISHOREGANJ'},
			{District:'NILPHAMARI', upazilla:'DIMLA'},
			{District:'NOAKHALI', upazilla:'SUNAIMORI'},
			{District:'NOAKHALI', upazilla:'KABIRHAT'},
			{District:'NOAKHALI', upazilla:'BEGUMGANJ'},
			{District:'NOAKHALI', upazilla:'HATIYA'},
			{District:'NOAKHALI', upazilla:'NOAKHALI SADAR'},
			{District:'NOAKHALI', upazilla:'CHATKHIL'},
			{District:'NOAKHALI', upazilla:'SHUBARNACHAR'},
			{District:'NOAKHALI', upazilla:'COMPANIGANJ'},
			{District:'PABNA', upazilla:'PABNA SADAR'},
			{District:'PABNA', upazilla:'BHANGURA'},
			{District:'PABNA', upazilla:'CHATMOHAR'},
			{District:'PABNA', upazilla:'SANTHIA'},
			{District:'PABNA', upazilla:'FARIDPUR'},
			{District:'PABNA', upazilla:'SANTHIA'},
			{District:'PABNA', upazilla:'BERA'},
			{District:'PABNA', upazilla:'SUJANAGAR'},
			{District:'PANCHAGARH', upazilla:'ATWARI'},
			{District:'PANCHAGARH', upazilla:'BODA'},
			{District:'PATUAKHALI', upazilla:'PATUAKHALI SADAR'},
			{District:'PATUAKHALI', upazilla:'BAWPHAL'},
			{District:'PATUAKHALI', upazilla:'DASHMINA'},
			{District:'PATUAKHALI', upazilla:'RANGABALI'},
			{District:'PATUAKHALI', upazilla:'MIRZAGANJ'},
			{District:'PATUAKHALI', upazilla:'DHUMKI'},
			{District:'PATUAKHALI', upazilla:'GALACHIPA'},
			{District:'PIROJPUR', upazilla:'BHANDARIA'},
			{District:'PIROJPUR', upazilla:'PIROJPUR SADAR'},
			{District:'PIROJPUR', upazilla:'INDURKANDI'},
			{District:'PIROJPUR', upazilla:'NESARABAD'},
			{District:'RAJBARI', upazilla:'RAJBARI SADAR'},
			{District:'RAJBARI', upazilla:'GOALANDA'},
			{District:'RAJBARI', upazilla:'BALIAKANDI'},
			{District:'RAJBARI', upazilla:'PANGSA'},
			{District:'RAJSHAHI', upazilla:'PUTHIA'},
			{District:'RAJSHAHI', upazilla:'BAGHA'},
			{District:'RAJSHAHI', upazilla:'DURGAPUR'},
			{District:'RAJSHAHI', upazilla:'PABA'},
			{District:'RAJSHAHI', upazilla:'MOHANPUR'},
			{District:'RAJSHAHI', upazilla:'GODAGARI'},
			{District:'RAJSHAHI', upazilla:'TANORE'},
			{District:'RAJSHAHI', upazilla:'CHARGHAT'},
			{District:'RANGAMATI', upazilla:'JURAICHARI'},
			{District:'RANGAMATI', upazilla:'BARKAL'},
			{District:'RANGAMATI', upazilla:'RANGAMATI SADAR'},
			{District:'RANGAMATI', upazilla:'KAPTAI'},
			{District:'RANGAMATI', upazilla:'NANIARCHAR'},
			{District:'RANGAMATI', upazilla:'LANGADU'},
			{District:'RANGAMATI', upazilla:'KAWKHALI'},
			{District:'RANGAMATI', upazilla:'RAJASTHALI'},
			{District:'RANGAMATI', upazilla:'BELAICHHARI'},
			{District:'RANGPUR', upazilla:'TARAGANJ'},
			{District:'RANGPUR', upazilla:'RANGPUR SADAR'},
			{District:'RANGPUR', upazilla:'PIRGACHA'},
			{District:'RANGPUR', upazilla:'PIRGANJ'},
			{District:'RANGPUR', upazilla:'BADARGANJ'},
			{District:'RANGPUR', upazilla:'KAUNIA'},
			{District:'RANGPUR', upazilla:'GANGACHARA'},
			{District:'RANGPUR', upazilla:'MITHAPUKUR'},
			{District:'SATKHIRA', upazilla:'TALA'},
			{District:'SATKHIRA', upazilla:'KALAROA'},
			{District:'SATKHIRA', upazilla:'SHAYMNAGAR'},
			{District:'SATKHIRA', upazilla:'SATKHIRA SADAR'},
			{District:'SATKHIRA', upazilla:'ASHASUNI'},
			{District:'SHARIATPUR', upazilla:'NARIA'},
			{District:'SHARIATPUR', upazilla:'SHARIATPUR SADAR'},
			{District:'SHARIATPUR', upazilla:'BHEDARGANJ'},
			{District:'SHARIATPUR', upazilla:'GOSHAIRHAT'},
			{District:'SHERPUR', upazilla:'NAKHLA'},
			{District:'SHERPUR', upazilla:'SREEBARDI'},
			{District:'SHERPUR', upazilla:'NALITABARI'},
			{District:'SHERPUR', upazilla:'SHERPUR SADAR'},
			{District:'SHERPUR', upazilla:'JHENAIGATI'},
			{District:'SIRAJGANJ', upazilla:'ULLAHPARA'},
			{District:'SIRAJGANJ', upazilla:'CHOWHALI'},
			{District:'SIRAJGANJ', upazilla:'TARASH'},
			{District:'SIRAJGANJ', upazilla:'SIRAJGANJ SADAR'},
			{District:'SIRAJGANJ', upazilla:'RAIGANJ'},
			{District:'SIRAJGANJ', upazilla:'KAZIPUR'},
			{District:'SIRAJGANJ', upazilla:'KAMARKHAND'},
			{District:'SUNAMGANJ', upazilla:'JAGANNATHPUR'},
			{District:'SUNAMGANJ', upazilla:'DOARABAZAR'},
			{District:'SUNAMGANJ', upazilla:'TAHIRPUR'},
			{District:'SUNAMGANJ', upazilla:'CHHATAK'},
			{District:'SUNAMGANJ', upazilla:'SUNAMGANJ SADAR'},
			{District:'SUNAMGANJ', upazilla:'JAMALGANJ'},
			{District:'SUNAMGANJ', upazilla:'CHHATAK'},
			{District:'SUNAMGANJ', upazilla:'SOUTH SUNAMGANJ'},
			{District:'SUNAMGANJ', upazilla:'DHARMAPASHA'},
			{District:'SYLHET', upazilla:'BALAGANJ'},
			{District:'SYLHET', upazilla:'BISWANATH'},
			{District:'SYLHET', upazilla:'COMPANIGANJ'},
			{District:'SYLHET', upazilla:'ZAKIGANJ'},
			{District:'SYLHET', upazilla:'KANAIGHAT'},
			{District:'SYLHET', upazilla:'OSMANINAGAR'},
			{District:'SYLHET', upazilla:'SOUTH SHURMA'},
			{District:'SYLHET', upazilla:'JAINTAPUR'},
			{District:'SYLHET', upazilla:'GOWAINGHAT'},
			{District:'SYLHET', upazilla:'BEANIBAZAR'},
			{District:'SYLHET', upazilla:'SYLHET SADAR'},
			{District:'SYLHET', upazilla:'GOLAPGANJ'},
			{District:'TANGAIL', upazilla:'TANGAIL SADAR'},
			{District:'TANGAIL', upazilla:'DHANBARI'},
			{District:'TANGAIL', upazilla:'MADHUPUR'},
			{District:'TANGAIL', upazilla:'KALIHATI'},
			{District:'TANGAIL', upazilla:'NAGARPUR'},
			{District:'TANGAIL', upazilla:'GOPALPUR'},
			{District:'TANGAIL', upazilla:'BHUAPUR'},
			{District:'TANGAIL', upazilla:'GHATAIL'},
			{District:'TANGAIL', upazilla:'MIRZAPUR'},
			{District:'TANGAIL', upazilla:'BASHAIL'},
			{District:'TANGAIL', upazilla:'DELDUAR'},
			{District:'TANGAIL', upazilla:'SHAKHIPUR'},
			{District:'THAKURGAON', upazilla:'THAKURGAON SADAR'},
			{District:'THAKURGAON', upazilla:'RANISANKAIL'},
			{District:'THAKURGAON', upazilla:'PIRGANJ'},
			{District:'THAKURGAON', upazilla:'BALIADANGI'}
					]


					$('#district').on('change', function(){
						$('#thana').html('<option></option>');
						const selected = thana.filter(thanas => thanas.District == $('#district').val());
						$.each(selected, function(key, val){
							$('#thana').append('<option>'+val.upazilla+'</option>');
						})
						
					})		
				})
		</script>
		";
	}
} 
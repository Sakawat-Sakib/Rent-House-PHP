const urlRoot = 'http://localhost/KingSizeProject/bashalagbe';

//UPLOAD IMAGE

function previewImageBeforeUpload(id){

	document.querySelector("#"+id).addEventListener('change',(e)=>{
		
		if(e.target.files.length == 0){

			return;

		}else{

			let fileFullPath = document.querySelector("#"+id).value;
			let idxDot = fileFullPath.lastIndexOf(".") + 1;
        	let extFile = fileFullPath.substr(idxDot, fileFullPath.length).toLowerCase();
			
			if(extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

				let file = e.target.files[0];

				let url = URL.createObjectURL(file);

				document.querySelector("#"+id+"-preview img").src = url ;

			}else{
				document.querySelector("#"+id+"-preview img").src =  `${urlRoot}/public/asset/img/product/imageicon.jpg`
				document.querySelector("#"+id).value = null
			}

		}

		
	})

}

previewImageBeforeUpload('file-1');
previewImageBeforeUpload('file-2');
previewImageBeforeUpload('file-3');
previewImageBeforeUpload('file-4');
previewImageBeforeUpload('file-5');


//UPLOAD IMAGE ONE BY ONE
let imgsInput = document.querySelectorAll('.imgUpload')

imgsInput.forEach((imgInput,index)=>{

	imgInput.addEventListener('input',()=>{

		if((index+1) <= (imgsInput.length-1))
		{
			imgsInput[index+1].disabled = false
			imgsInput[index+1].parentNode.classList.remove('disabled')
		}
		
	})

})


//CHANGING AREA OPTIONS

let district = document.querySelector('.select_district');
let areaOption = document.querySelector('.select_area');
let selectedArea = document.querySelector('#area_id_post').value;

district.addEventListener('input',()=>{
	let dis_id = district.value 

	fetch(`${urlRoot}/posts/selectedArea/${dis_id}`)
	.then(res => res.json())
	.then((data)=>{
		
		areaOption.disabled = false;


		areaOption.innerHTML = null;
		areaOption.innerHTML = `<option  disabled selected>* Select Area</option>`;

		data.forEach((areas)=>{

			areaOption.innerHTML += `
				<option value="${areas.id}" > ${areas.area} </option>
			`;

		})





	})

})


//CHANGE AREA OPNTION AUTO
function channgeAreaAuto(){

	if (typeof district.value !== 'undefined'  && district.value !== '-1') {
	  let auto_dis = district.value 

		fetch(`${urlRoot}/posts/selectedArea/${auto_dis}`)
		.then(res => res.json())
		.then((data)=>{
			
			areaOption.disabled = false;


			areaOption.innerHTML = null;
			areaOption.innerHTML = `<option  disabled selected>* Select Area</option>`;

			data.forEach((areas)=>{

				if(selectedArea != '' && selectedArea == areas.id){
					areaOption.innerHTML += `
						<option selected value="${areas.id}" > ${areas.area} </option>
					`;
				}else{

					areaOption.innerHTML += `
						<option value="${areas.id}" > ${areas.area} </option>
					`;

				}
				

			})





		})
	}

	
}

channgeAreaAuto();

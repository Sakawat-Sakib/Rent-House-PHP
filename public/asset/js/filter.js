
const urlRoot = 'http://localhost/KingSizeProject/bashalagbe';
let district = document.querySelector('.selectedDistrict');
let areaOption = document.querySelector('.area_list');
let selectedAreaID = document.querySelector('#area_id_js').value;



//CHANGING AREA OPTIONS IN FILTER 
district.addEventListener('input',()=>{
	let dis_id = district.value 

	fetch(`${urlRoot}/posts/selectedArea/${dis_id}`)
	.then(res => res.json())
	.then((data)=>{
		
		areaOption.disabled = false;


		areaOption.innerHTML = null;
		areaOption.innerHTML = `<option  disabled selected>*Select Area</option>`;

		data.forEach((areas)=>{

			areaOption.innerHTML += `
				<option value="${areas.id}" > ${areas.area} </option>
			`;

		})





	})

})


//CHANGING AREA OPTION AUTO
function channgeAreaAutoFilter(){

	if (typeof district.value !== 'undefined'  && district.value !== '-1') {
	  let auto_dis = district.value 

		fetch(`${urlRoot}/posts/selectedArea/${auto_dis}`)
		.then(res => res.json())
		.then((data)=>{
			
			areaOption.disabled = false;


			areaOption.innerHTML = null;
			areaOption.innerHTML = `<option  disabled selected>*Select Area</option>`;

			data.forEach((areas)=>{

				if(selectedAreaID != -1 && selectedAreaID == areas.id){

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

channgeAreaAutoFilter()


//POSITION FIXED

let filterBox = document.querySelector('.filter_box');
let containerWidth = document.querySelector('.filter_box_container').offsetWidth;
let bodyHeight = document.body.scrollHeight;
console.log(bodyHeight)
let seventyPerHeight = bodyHeight*.80;
	filterBox.style.width = `${containerWidth}px`;


function changePosition(){
	if(bodyHeight > 1000){

		if(window.scrollY > 159 && window.scrollY < seventyPerHeight){
			filterBox.style.top = null;
			filterBox.classList.remove('abs');
			filterBox.classList.add('fixed');
		}else if(window.scrollY >= seventyPerHeight){
			filterBox.classList.remove('fixed');
			filterBox.classList.add('abs');
			filterBox.style.top = `${seventyPerHeight}px`;
		}else{
			filterBox.classList.remove('abs');
			filterBox.classList.remove('fixed');
			filterBox.style.top = null;
		}
	}	
}

window.addEventListener('scroll',changePosition);


//CHANGE WIDTH ON RESIZE
function WindowSize(){

 	containerWidth = document.querySelector('.filter_box_container').offsetWidth;
 	filterBox.style.width = `${containerWidth}px`;
}

window.addEventListener('resize',WindowSize);








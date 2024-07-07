//EDIT BOX OPEN
let editBtns = document.querySelectorAll('.edit')
let editCrossBtn = document.querySelector('.edit_box_cross')
let locChngBox = document.querySelector('.admn_edit_box')

let editBox = document.querySelector('.edit_form_box')


function editData(editBtn){

	event.preventDefault()

	let id =  editBtn.getAttribute("data-id");
	let table =  editBtn.getAttribute("data-table");
	let col =  editBtn.getAttribute("data-col");


	editBox.innerHTML = `
		<form>
			<input id="catName" class="inputField" type="text">
			<p class="error_p edit_p"></p>
			<input data-id="${id}" data-col="${col}" data-table="${table}"  class="submitBtn" type="submit" value="Submit">
		</form>
	`
	let inputField = document.querySelector('.inputField')

	fetch(`${urlRoot}/admin/beforeEdit/${id}/${col}/${table}`)
	.then(res => res.json())
	.then((data)=>{
		inputField.value = data[col]
	})

	

	//SUBMIT DATA
	let submit = document.querySelector('.submitBtn')
	

		submit.addEventListener('click',(e)=>{
			e.preventDefault();

			let editP = document.querySelector('.edit_p')
			let id = submit.dataset.id;
			let table = submit.dataset.table;
			let col = submit.dataset.col;
			let inputValue =  capitalize(inputField.value)

			fetch(`${urlRoot}/admin/edit/${id}/${col}/${inputValue}/${table}`)
			.then(res => res.json())
			.then((data)=>{
				if(data.message == 'Updated'){

					editBtn.parentNode.previousElementSibling.innerText = inputValue;
					locChngBox.classList.remove('active');

				}else if(data.message == 'error'){
					editP.innerText = `${col} already exist`;
				}
			})
			

		})

	//*****************
	locChngBox.classList.add('active');
}




editCrossBtn.addEventListener('click',()=>{
		locChngBox.classList.remove('active');
	})




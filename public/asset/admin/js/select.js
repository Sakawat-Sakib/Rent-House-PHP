
//SELECT LOCATION
let selectedLocation = document.querySelector('.selected_location')
let areaTable = document.getElementById('area_table')

selectedLocation.addEventListener('change',()=>{
	let locID = selectedLocation.value

	fetch(`${urlRoot}/admin/singleLocationArea/${locID}`)
	.then(res => res.json())
	.then((data)=>{

		area_table.innerHTML =null;

		data.forEach((areas)=>{
			let className = ''
			let btnText = ''

			if(areas.status == 0){
				className = 'deactiveBtn'
				btnText = 'Deactive'
			}else if(areas.status == 1){
				className = 'activeBtn'
				btnText = 'Active'
			}

			 area_table.innerHTML +=`
					<tr>
						<td>${areas.id}</td>
						<td>${areas.location}</td>
						<td>${areas.area}</td>
						
						<td>
							<a data-id="${areas.id}" data-table="areas" class="${className} statusBtn" href="#" onclick="changeStatus(this)">${btnText}</a>
							<a data-id="${areas.id}" data-table="areas" data-col="area" class="edit" href="#"  onclick="editData(this)" >Edit</a>
							<a data-id="${areas.id}" data-table="areas" class="delete" href="#" onclick="deleteData(this)">Delete</a>
						</td>
					</tr>

				`

				
		})

		
			
		
	})
})
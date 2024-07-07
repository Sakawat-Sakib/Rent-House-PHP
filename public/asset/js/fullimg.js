let imgBoxs = document.querySelectorAll('.small_img_box')
let fullImg = document.querySelector('#fullImg');

imgBoxs.forEach((imgBox)=>{
	imgBox.addEventListener('click',(e)=>{
		let imgUrl = e.target.firstElementChild.attributes[0].value;
		
		fullImg.src = imgUrl;
	})
})
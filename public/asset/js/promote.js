let packs = document.querySelectorAll('.package');
let post = document.querySelector('#singlePro');
let payBtn = document.querySelector('#paymentBtn');

let packType = document.querySelector('#pack_type');
let subPrice = document.querySelector('#sub_price');
let totalPrice = document.querySelector('#total_price');

packs.forEach((pack)=>{
	pack.addEventListener('input',()=>{

		payBtn.disabled = false;
		payBtn.classList.remove('disabled');

		if(pack.value == 'top'){
			post.classList.remove('highlight');
			post.classList.add('top');

			packType.innerText = 'Top Ad (3 days)';
			subPrice.innerText = '300';
			totalPrice.innerText = '300';
		}else{
			post.classList.remove('top');
			post.classList.add('highlight');

			packType.innerText = 'Highlight Ad (3 days)';
			subPrice.innerText = '150';
			totalPrice.innerText = '150';
		}
	})
})
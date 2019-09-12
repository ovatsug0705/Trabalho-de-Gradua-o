function filterMobile(){
	const filterModal = document.querySelector('[data-filter]');
	const filterClose = document.querySelector('[data-filter-close]');
	const filterButton = document.querySelector('[data-filter-button]');

	function setupListeners(){
		filterClose.addEventListener('click', ()=> {
			filterModal.classList.remove('active');
			document.body.classList.remove('hide2');
		});

		filterButton.addEventListener('click', ()=> {
			filterModal.classList.add('active');
			document.body.classList.add('hide2');
		});
	}

	function init() {
		setupListeners();
	}

	if(filterModal) init();
}

export default {
	create: filterMobile,
}
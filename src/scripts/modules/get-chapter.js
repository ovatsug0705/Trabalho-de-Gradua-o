import axios from 'axios';

function getChapters() {

	const booksHld = document.querySelector('[data-books]');
	const chapterHld = document.querySelector('[data-books-number]');
	const books = document.querySelectorAll('[data-book]');
	let book, options = '';
	let first = true;

	function setupListeners() {
		booksHld.addEventListener('change', getChap);
	}

	function getChap() {
		book = first ? booksHld.dataset.books : booksHld.value;
		axios.get(`${window.location.origin}/bible-books-count/${book}`).then( res => {
			Array.from(res.data).forEach( elm => {
				options += `<option value="${elm.chapter}">${elm.chapter}</option>`;
			});
			chapterHld.innerHTML = options;
		})
		first = false;
		options = '';
	}

	function init() {
		getChap();
		setupListeners();
	}

	if(booksHld && chapterHld && books) init();
}

export default {
	create: getChapters
}
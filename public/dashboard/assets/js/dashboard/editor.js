

ClassicEditor
		.create( document.querySelector( '.editor' ),{

        } )
		.catch( error => {
			console.error( error );
		} );


// ClassicEditor
//     .create(document.querySelector('.editor'), {
//         data: document.querySelector('.editor').value // Initialize CKEditor with textarea's value
//     })
//     .then(editor => {
//         console.log('Editor initialized:', editor);
//     })
//     .catch(error => {
//         console.error('Error initializing editor:', error);
//     });

// document.querySelector('form').addEventListener('submit', function() {
//     document.querySelector('.editor').value = CKEDITOR.instances.editor.getData();
// });
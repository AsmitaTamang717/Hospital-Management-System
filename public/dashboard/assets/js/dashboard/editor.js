
// Select all elements with the class 'editor'
const editorElements = document.querySelectorAll('.editor');

// Loop through each editor element and initialize ClassicEditor
editorElements.forEach(element => {
    ClassicEditor
        .create(element, {
            // Configuration options for each editor
           
        })
        .then(editor => {
            console.log('Editor initialized successfully:', editor);
        })
        .catch(error => {
            console.error('Error initializing editor:', error);
        });
});



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
function previewFileNews() {
    const previewContainer = document.querySelector('#file-preview-container');
    previewContainer.innerHTML = '';    

    const files = document.querySelector('#news_files').files;

    Array.from(files).forEach(file => {

        $('#div-file-preview').removeClass('d-none');

        const reader = new FileReader();
        
        reader.onload = function(e) {
            const fileUrl = e.target.result;
            const fileType = file.type;

            let element;
            if (fileType.startsWith('image/')) {
                element = document.createElement('img');
                element.src = fileUrl;
                element.style.width = '100px'; 
                element.style.margin = '10px';
            } else {
                element = document.createElement('iframe');
                element.src = fileUrl;
                element.style.width = '100%';
                element.style.height = '500px';
                element.style.margin = '10px 0';
            }
            
            previewContainer.appendChild(element);
        };

        reader.readAsDataURL(file);
    });
}
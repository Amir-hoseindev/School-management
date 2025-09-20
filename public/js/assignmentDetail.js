   function triggerFileUpload(assignmentId) {
   
        document.getElementById('file-input-' + assignmentId).click();
        
        
        document.getElementById('file-input-' + assignmentId).addEventListener('change', function() {
            if (this.files.length > 0) {
          
                document.getElementById('assignment-form-' + assignmentId).submit();
            }
        });
    }
class MyUploadCKE {
    constructor(loader) {
        // INSTANCE TO BE USED
        this.loader = loader;
    }

    // STARTS THE UPLOAD PROCESS
    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // ABORTS THE UPLOAD PROCESS
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    //  INITIALIZE THE OBJECT USING URL PASSED
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();
        xhr.open('POST', globalUrl + '/core/CKEupload', true);
        xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
        xhr.responseType = 'json';
    }

    // INIT LISTENERS
    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {

            // ERROR
            const response = xhr.response;
            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }

            // SUCCESS
            resolve({
                default: response.url
            });

        });

        // UPLOAD PROGRESS
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // PREPARE DATA AND SENDS REQUEST
    _sendRequest(file) {

        // CREATE FORMDATA
        const data = new FormData();

        // APPEND FILE
        data.append('upload', file);

        // SEND REQUEST.
        this.xhr.send(data);
    }
}

function UploadPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        // URL TO UPLOAD CKE
        return new MyUploadCKE(loader);
    };
}
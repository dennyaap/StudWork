class Alert{
    static createDangerAlert(error){
        return `<div class="alert alert-danger" role="alert" id="alert">
                         ${error}   
        </div>`
    }
}
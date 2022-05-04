class Resume{
    static getResumeStudent(data){
        let route = '/app/controllers/vacancy-page/getResumeStudent.php';
        let res = postDataResponse(route, data);
        return res;
    }
    static sendResume(data){
        let route = '/app/controllers/vacancy-page/sendResume.php';
        let res = postDataResponse(route, data);
        return res;
    }
    static checkResume(resume_id){
        let route = '/app/controllers/vacancy-page/checkResume.php';
        let res = postDataResponse(route, resume_id);
        return res;
    }
    static async getResume(resume_id){
        let route = '/app/controllers/vacancy-page/getResume.php';
        let res = await postDataResponse(route, resume_id);
        return res;
    }
}

class Resume{
    static async getResumeList(resume_id){
        let route = '/app/controllers/admin-panel/resume/getResumeList.php';
        let result = await postDataResponse(route, resume_id);
        return result;
    }
    static async getResume(resume_id){
        let route = '/app/controllers/admin-panel/resume/getResume.php';
        let result = await postDataResponse(route, resume_id);
        return result;
    }
    static editResume(data){
        let route = '/app/controllers/student-panel/resume/editResume.php';
        let res = postDataResponse(route, data);
        return res;
    }
}
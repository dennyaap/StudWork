class Resume{
    static createResume(data){
        let route = '/app/controllers/student-panel/create-resume/createResume.php';
        let res = postDataResponse(route, data);
        return res;
    }
    static getResumeStudent(data){
        let route = '/app/controllers/student-panel/resume/getResumeStudent.php';
        let res = postDataResponse(route, data);
        return res;
    }
    static editResume(data){
        let route = '/app/controllers/student-panel/resume/editResume.php';
        let res = postDataResponse(route, data);
        return res;
    }
    static async getResume(resume_id){
        let route = '/app/controllers/student-panel/resume/getResume.php';

        let result = await postDataResponse(route, resume_id);
        return result;
    }
}
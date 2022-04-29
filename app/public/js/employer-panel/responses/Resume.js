class Resume{
    static async getResume(resume_id){
        let route = '/app/controllers/employer-panel/responses/getResume.php';
        let result = await postDataResponse(route, resume_id);
        return result;
    }
}
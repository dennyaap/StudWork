class Validation{
    static async checkResume(vacancy_id){
        let result = await Resume.checkResume(vacancy_id);
        return result;
    }
}
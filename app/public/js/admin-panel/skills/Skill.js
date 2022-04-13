class Skill{
    static async checkSkill(name){
        let route = '/app/controllers/admin-panel/skills/checkSkill.php';

        let result = await postDataResponse(route, name);
        return result;
    }
    static async findSkill(id){
        let route = '/app/controllers/admin-panel/skills/findSkill.php';

        let result = await postDataResponse(route, id);
        return result;
    }
    static async editSkill(skill){
        let route = '/app/controllers/admin-panel/skills/editSkill.php';

        await postData(route, skill);
    }
    static async deleteSkill(id){
        let route = '/app/controllers/admin-panel/skills/deleteSkill.php';

        await postData(route, id);
    }
}
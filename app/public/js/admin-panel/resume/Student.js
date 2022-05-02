class Student{
    static async getStudents(){
        let route = '/app/controllers/admin-panel/resume/getStudents.php';
        let result = await getData(route);
        return result;
    }
}
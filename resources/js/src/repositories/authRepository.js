import Repository from '@/Repository';
const resource = '/auth';

export default {
    postSignUp(DTO){
        return Repository.post(`${resource}/signup` , DTO);
    }
};
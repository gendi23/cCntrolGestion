import AuthRepository from "./authRepository";

const repositories ={
    auth : AuthRepository
}

export const RepositoryFactory = {
    get: name => repositories[name]
}
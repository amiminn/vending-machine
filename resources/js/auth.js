export const registerToken = function (token) {
    window.tokenBearer = encryptData(token);
};

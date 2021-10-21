export default function Validators() {
    const email = (value) => {
        const regx =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return regx.test(value) ? true : false;
    };

    const password = (value, minLength, maxLength) => {
        return value.length >= minLength && value.length < maxLength
            ? true
            : false;
    };

    return {
        email,
        password,
    };
}

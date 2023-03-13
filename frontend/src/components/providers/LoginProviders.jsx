import axios from "axios";
import { createContext, useEffect, useState } from "react";
import { useHistory } from "react-router-dom";

export const LoginContext = createContext({});

export const LoginProviders = (props) => {
    const {children} = props;
    const history = useHistory();
    const url = `http://localhost:8888/api/user`;

    const [ isLogin, setIsLogin ] = useState(false);
    console.log('isLogin',isLogin);

    useEffect(()=>{
        console.log('aaa');
        (async ()=>{
            try{
                const res = await axios.get(url);
            console.log('res.data.id', res.data.id);
            if(!res.data.id){
                history.push('/login');
            }
            setIsLogin(true);
            }catch (e){
                history.push('/login');
                throw new Error(e);
            }
            })();
    },[isLogin]);


    return (
        <LoginContext.Provider value={{ isLogin, setIsLogin }}>
            {children}
        </LoginContext.Provider>
    )
}

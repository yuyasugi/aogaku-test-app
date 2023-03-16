import axios from "axios";
import { createContext, useEffect, useState } from "react";
import { useHistory } from "react-router-dom";

export const LoginContext = createContext({});

export const LoginProviders = (props) => {
    const {children} = props;
    const history = useHistory();
    const url = `http://localhost:8888/api/user`;

    const [ isLogin, setIsLogin ] = useState(false);
    const  [ userId, setUserId ] = useState();
    const  [ type, setType ] = useState();
    // console.log('isLogin',isLogin);

    useEffect(()=>{
        (async ()=>{
            try{
                const res = await axios.get(url);
            console.log('res', res);
            if(!res.data.id){
                history.push('/login');
            }
            setUserId(res.data.id);
            setType(res.data.type);
            setIsLogin(true);
            }catch (e){
                history.push('/login');
                throw new Error(e);
            }
            })();
    },[isLogin]);


    return (
        <LoginContext.Provider value={{ isLogin, setIsLogin, userId, type }}>
            {children}
        </LoginContext.Provider>
    )
}

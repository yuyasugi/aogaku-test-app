import React, { useEffect, useState } from "react";
import axios from "axios";


    export const AdminHome = () => {
        const url = "http://localhost:8888/api/admin";
        const [adminHome, setadminHome] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.users);
            setadminHome(res.data.users)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminHome",adminHome);

    return  (
        <div>
        {adminHome.map((s) => {
            return (
            <div>{s.name}</div>
            )})}
        </div>
        )
    }

import React, { useEffect, useState } from "react";
import axios from "axios";


    export const Result = () => {
        const url = `http://localhost:8888/api/result`;
        const [result, setResult] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.issueResult);
            setResult(res.data.issueResult)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("result",result);

    return  (
        <div>
        {result.map((s) => {
            return (
                <>
                <div>{s}</div>
                </>
            )})}
        </div>
        )
    }

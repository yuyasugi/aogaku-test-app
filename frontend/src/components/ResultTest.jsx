import React, { useEffect, useState } from "react";
import axios from "axios";


    export const ResultTest = () => {
        const url = "http://localhost:8888/api/result_test";
        const [resultTest, setResultTest] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.issueResult);
            setResultTest(res.data.issueResult)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("resultTest",resultTest);

    return  (
        <div>
        {resultTest.map((s) => {
            return (
                <>
                <div>{s}</div>
                </>
            )})}
        </div>
        )
    }

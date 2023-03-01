import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";
import { Button, ChakraProvider, FormControl, FormLabel, Input } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import styled from "styled-components";


    export const IssueTestList = () => {
        const { unit_id } = useParams();
        const url = `http://localhost:8888/api/issue_test/${unit_id}`;
        const [issueTestList, setIssueTestList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.unitIssue);
            setIssueTestList(res.data.unitIssue)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("issueTestList",issueTestList);

    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <FormControl>
                {issueTestList.map((s) => {
            return (
                <>
                    <FormLabel>{s.problem}</FormLabel>
                    <Input type='text' focusBorderColor='lime' placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' />
                </>
                    )})}
                    {/* <Input type="hidden" value={value}/> */}
                    <Button mt={4} colorScheme="teal">
                        Submit
                    </Button>
                    </FormControl>
                </>
            </SContainer>
        </ChakraProvider>
        )
    }

    const SContainer = styled.div`
    background-color: rgba(1, 75, 21, 40%);
    height: 100%;
    width: 100%;
    `

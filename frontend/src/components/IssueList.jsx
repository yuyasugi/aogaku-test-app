import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";
import { Button, ChakraProvider, FormControl, FormLabel, Input } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import styled from "styled-components";


    export const IssueList = () => {
        const { unit_id } = useParams();
        const url = `http://localhost:8888/api/issue/${unit_id}`;
        const [issueList, setIssueList] = useState([])

        const [value, setValue] = useState([])
        const handleEditFormChange = (e) => {
            console.log({value})
            setValue([e.target.value]);
          }

        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.unitIssue);
            setIssueList(res.data.unitIssue)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("issueList",issueList);

    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <FormControl>
                {issueList.map((s) => {
            return (
                <>
                    <FormLabel>{s.problem}</FormLabel>
                    <Input onChange={(e) => setValue(e.target.value)} type='text' focusBorderColor='lime' placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' />
                </>
                    )})}
                    {/* <Input type="hidden" value={value}/> */}
                    <Button mt={4} colorScheme="teal" onClick={handleEditFormChange}>
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

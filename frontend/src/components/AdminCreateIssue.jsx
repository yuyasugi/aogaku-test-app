import React, { useEffect, useState } from "react";
import axios from "axios";
import { FormControl, FormLabel, Select, Input, Button, ChakraProvider, Textarea } from "@chakra-ui/react";


    export const AdminCreateIssue = () => {
        const url = "http://localhost:8888/api/create_issue";
        const [adminCreateSubjects, setAdminCreateSubjects] = useState([])
        const [adminCreateReferenceBooks, setAdminCreateReferenceBooks] = useState([])
        const [adminCreatUnits, setAdminCreateUnits] = useState([])

        const handleChangeSubject = (e) => {
            setAdminCreateSubjects(e.target.value);
          }
        // const handleChangeReferenceBook = (e) => {
        //     setAdminCreateReferenceBooks(e.target.value);
        //   }
        // const handleChangeUnit = (e) => {
        //     setAdminCreateUnits(e.target.value);
        //   }

        const [valueProblem, setValueProblem] = useState([]);
        const [valueAnser, setValueAnser] = useState([]);
        const [valueVCommentary, setValueCommentary] = useState([]);

        const handleChangeProblrm = (e) => {
            setValueProblem(e.target.value);
          }
        const handleChangeAnser = (e) => {
            setValueAnser(e.target.value);
          }
        const handleChangeCommentary = (e) => {
            setValueCommentary(e.target.value);
          }

        const onClickAdd = async () => {
            const res = await axios.post(`http://localhost:8888/api/store`,[{adminCreateSubjects,adminCreateReferenceBooks,adminCreatUnits,valueProblem,valueAnser,valueVCommentary}]);
            console.log(res);
        }

        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            // console.log(res.data.createSubjects);
            setAdminCreateSubjects(res.data.createSubjects)
            setAdminCreateReferenceBooks(res.data.createReferenceBooks)
            setAdminCreateUnits(res.data.createUnits)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);

    return  (
        <ChakraProvider>
            <FormControl>
                <FormLabel>教科</FormLabel>
                <Select value={adminCreateSubjects} onChange={(e) => handleChangeSubject(e)} name="subject" placeholder='教科選択'>
        {adminCreateSubjects.map((s) => {
            return (
                  <option value={s.id}>{s.name}</option>
            )})}
            </Select>
            <FormLabel>参考書</FormLabel>
                <Select name="reference_book" placeholder='参考書選択'>
        {adminCreateReferenceBooks.map((s) => {
            return (
                  <option>{s.name}</option>
            )})}
            </Select>
            <FormLabel>単元</FormLabel>
                <Select name="unit" placeholder='単元選択'>
        {adminCreatUnits.map((s) => {
            return (
                  <option>{s.name}</option>
            )})}
            </Select>
            <FormLabel>問題文</FormLabel>
                    <Input onChange={handleChangeProblrm} value={valueProblem} name="problem" type='text' focusBorderColor='lime' placeholder='問題文を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解答</FormLabel>
                    <Input onChange={handleChangeAnser} value={valueAnser} name="anser" type='text' focusBorderColor='lime' placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解説</FormLabel>
                    <Textarea onChange={handleChangeCommentary} value={valueVCommentary} name="commentary" type='text' focusBorderColor='lime' placeholder='解説を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <Button onClick={onClickAdd} mt={4} colorScheme="teal" type="submit">
                問題を追加する
            </Button>
            </FormControl>
        </ChakraProvider>
        )
    }

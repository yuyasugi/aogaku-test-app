import React, { useEffect, useState } from "react";
import axios from "axios";
import { FormControl, FormLabel, Select, Input, Button, ChakraProvider, Textarea } from "@chakra-ui/react";
import { Message } from "./organizm/Message";


    export const AdminCreateIssue = () => {
        const url = "http://localhost:8888/api/create_issue";

        const [adminCreateSubjects, setAdminCreateSubjects] = useState([])
        const [selectedSubject, setSelectedSubject] = useState("")
        const [adminCreateReferenceBooks, setAdminCreateReferenceBooks] = useState([])
        const [selectedReferenceBook, setSelectedReferenceBook] = useState("")
        const [adminCreatUnits, setAdminCreateUnits] = useState([])
        const [selectedUnit, setSelectedUnit] = useState("")


        const handleChangeSubject = (e) => {
            setSelectedSubject(e.target.value);
          }

        const handleChangeReferenceBook = (e) => {
            setSelectedReferenceBook(e.target.value);
          }
        const handleChangeUnit = (e) => {
            setSelectedUnit(e.target.value);
          }

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

        const { showMessage } = Message();

        const onClickAdd = async () => {
            const res = await axios.post(`http://localhost:8888/api/store`,{selectedSubject,selectedReferenceBook,selectedUnit,valueProblem,valueAnser,valueVCommentary});
            console.log(res);
            showMessage({ title: "問題が追加されました", status: "success" });
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
            <Select value={selectedSubject} onChange={handleChangeSubject} name="subject" placeholder='教科選択'>
        {adminCreateSubjects.map((s) => {
            return (
                  <option value={s.id}>{s.name}</option>
            )})}
            </Select>
            <FormLabel>参考書</FormLabel>
                <Select value={selectedReferenceBook} onChange={handleChangeReferenceBook} name="reference_book" placeholder='参考書選択'>
        {adminCreateReferenceBooks.map((s) => {
            return (
                  <option value={s.id}>{s.name}</option>
            )})}
            </Select>
            <FormLabel>単元</FormLabel>
                <Select value={selectedUnit} onChange={handleChangeUnit} name="unit" placeholder='単元選択'>
        {adminCreatUnits.map((s) => {
            return (
                  <option value={s.id}>{s.name}</option>
            )})}
            </Select>
            <FormLabel>問題文</FormLabel>
                    <Input onChange={handleChangeProblrm} value={valueProblem} name="problem" type='text' focusBorderColor="green.700" placeholder='問題文を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解答</FormLabel>
                    <Input onChange={handleChangeAnser} value={valueAnser} name="anser" type='text' focusBorderColor="green.700" placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解説</FormLabel>
                    <Textarea onChange={handleChangeCommentary} value={valueVCommentary} name="commentary" type='text' focusBorderColor="green.700" placeholder='解説を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <Button onClick={onClickAdd} mt={4} colorScheme="teal" type="submit">
                問題を追加する
            </Button>
            </FormControl>
        </ChakraProvider>
        )
    }
